<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestedDocument;
use Validator;
use File;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification;
use Gate;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ActivityLog;



class RequestedDocumentController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('staff_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $documents = RequestedDocument::where('isRemove', 0)->latest()->get();
        return view('admin.manage_requested_documents',compact('documents'));
    }

    public function requested(RequestedDocument $requested){

        if (request()->ajax()) {
            return response()->json([
                'status'                    => $requested->status,
                'payment'                   => $requested->isPaid,
                'resident'                  => $requested->resident->last_name.','.$requested->resident->first_name.'('.$requested->resident->middle_name .')', 
                'document'                  => $requested->document->name,
                'claiming_date'             => $requested->claiming_date,

                
                'requirement'               => $requested->document->requirements()->get(),
                'uploaded_requirement'      => $requested->requirements()->get(),
                'uploaded_receipt'          => $requested->receipt,
                
                'claimed_option'            => $requested->claiming_option,

                'amount_to_pay'             => $requested->amount_to_pay,
                'downloadable'              => $requested->downloadable,

            ]);
        }
        
    }

    public function update_requested(Request $request, RequestedDocument $requested){
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
           'claiming_date'  =>  ['required', 'date' , 'after:today'],

        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        if($requested->isPaid == 0){
            if($request->input('payment') == 1){
                $emailContent = [
                    'notif'       => 'Your payment has been received',
                    'msg'         => 'request_paid',
                ];
        
                Mail::to($requested->resident->user->email)
                        ->send(new Notification($emailContent));
            }
        }

        if($requested->status != 'APPROVED'){
            if($request->input('status') == 'APPROVED'){
                $emailContent = [
                    'notif'          => 'Your requested document has been approved',
                    'msg'            => 'request_approved',
                    'request_number' => $requested->request_number,
                    'document'       => $requested->document->name,
                    'claiming_date'  => Carbon::createFromFormat('Y-m-d',$requested->claiming_date)->format('M j , Y'),
                    
                ];
        
                Mail::to($requested->resident->user->email)
                        ->send(new Notification($emailContent));
            }
        }
        
        if($requested->status != 'COMPLETED'){
            if($request->input('status') == 'COMPLETED'){
                $emailContent = [
                    'notif'       => 'Your requested document has been completed',
                    'msg'         => 'request_completed',
                    
                ];
        
                Mail::to($requested->resident->user->email)
                        ->send(new Notification($emailContent));
            }
        }
        
        if($requested->status != 'DECLINED'){
            if($request->input('status') == 'DECLINED'){
                $emailContent = [
                    'notif'       => 'Your requested document has been declined',
                    'msg'         => 'request_declined',
                ];
        
                Mail::to($requested->resident->user->email)
                        ->send(new Notification($emailContent));
            }
        }

        if ($request->file('downloadable_file')) {
            File::delete(public_path('resident/downloadable_file/'.$requested->downloadable));
            $file = $request->file('downloadable_file');
            $extension = $file->getClientOriginalExtension(); 
            $file_name_to_save = $requested->document->name."_".$requested->resident->id.".".$extension;
            $file->move('resident/downloadable_file/', $file_name_to_save);
        }

        $requested->update([
            'status'         => $request->input('status'),
            'isPaid'         => $request->input('payment'),
            'claiming_date'  => $request->input('claiming_date'),
            'downloadable'   => $file_name_to_save ?? $requested->downloadable,
        ]);

        ActivityLog::create([
            'activity'  => 'Activity: Updated requested document <br>
                            Request Number: '.$requested->request_number.
                           '<br> Resident Name: '.$requested->resident->last_name.','.$requested->resident->first_name.
                           '<br> Status: '.$requested->status.
                           '<br> User: '. auth()->user()->name,
                            
        ]);
      
        return response()->json(['success' => 'Updated Successfully.']);

    }
    
    
}
