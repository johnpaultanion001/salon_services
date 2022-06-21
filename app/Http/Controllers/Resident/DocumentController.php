<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\RequestedDocumentRequirement;
use App\Models\RequestedDocument;
use Validator;
use File;
use Carbon\Carbon;


class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::where('isAvailable', true)->orderBy('name', 'asc')->get();
        return view('resident.documents',compact('documents'));
    }

    public function request(Document $document){
        return view('resident.request',compact('document'));
    }

    public function request_store(Request $request, Document $document){
        date_default_timezone_set('Asia/Manila');
        
        $validated =  Validator::make($request->all(), [
            'claiming_option'  => ['required'],
            'receipt'           => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $receipt = $request->file('receipt');
        $extension = $receipt->getClientOriginalExtension(); 
        $file_receipt = time().".".$extension;
        $receipt->move('resident/receipt/', $file_receipt);

        $request1 = RequestedDocument::create([
            'request_number'    =>  'BRGY'.substr(time(), 4).auth()->user()->id,
            'resident_id'       =>  auth()->user()->resident->id,
            'document_id'       =>  $document->id,
            'amount_to_pay'     =>  $document->amount,
            'receipt'           =>  $file_receipt,
            'claiming_option'  =>  $request->input('claiming_option'),
        ]);

        foreach($document->requirements()->get() as $requirement1 )
        {
            
            $requirement = $request->file($requirement1->id);
            $extension = $requirement->getClientOriginalExtension(); 
            $file_name_to_save = $requirement1->id.auth()->user()->resident->id.$request1->id.'_'.auth()->user()->resident->last_name.".".$extension;
            $requirement->move('resident/requirements/', $file_name_to_save);

            RequestedDocumentRequirement::updateOrCreate(
                [
                    'requested_document_id'    => $request1->id,
                    'document_id'              => $document->id,
                    'document_requirement_id'  => $requirement1->id,
                    'name'                     => $file_name_to_save,
                ],
                [
                    'requested_document_id'    => $request1->id,
                    'document_id'              => $document->id,
                    'document_requirement_id'  => $requirement1->id,
                    'name'                     => $file_name_to_save,
                ]
            );
        }
        return response()->json(['success' => 'Your document has been successfully requested.']);

    }

    public function request_update(Request $request ,RequestedDocument $request_id){
        date_default_timezone_set('Asia/Manila');
       

        foreach($request_id->document->requirements()->get() as $requirement1)
        {
                if($request->file($requirement1->id)){
                    $delete_re = RequestedDocumentRequirement::where('requested_document_id', $request_id->id)
                                                  ->where('document_id', $request_id->document->id)
                                                  ->where('document_requirement_id', $requirement1->id)
                                                  ->first();
                    File::delete(public_path('resident/requirements/'.$delete_re->name));
                    $requirement = $request->file($requirement1->id);
                    $extension = $requirement->getClientOriginalExtension(); 
                    $file_name_to_save = $requirement1->id.auth()->user()->resident->id.$request_id->id.'_'.auth()->user()->resident->last_name.".".$extension;
                    $requirement->move('resident/requirements/', $file_name_to_save);
    
                    RequestedDocumentRequirement::where('requested_document_id', $request_id->id)
                                                  ->where('document_id', $request_id->document->id)
                                                  ->where('document_requirement_id', $requirement1->id)
                                                  ->update([
                                                    'name'  => $file_name_to_save,
                                                  ]);
                }
        }

        if($request->file('receipt')){
            File::delete(public_path('resident/receipt/'.$request_id->receipt));
            $receipt = $request->file('receipt');
            $extension = $receipt->getClientOriginalExtension(); 
            $file_receipt = time().".".$extension;
            $receipt->move('resident/receipt/', $file_receipt); 
        }


        $request_id->update([
            'claiming_option'   =>  $request->input('claiming_option'),
            'receipt'           =>  $file_receipt ?? $request_id->receipt,
        ]);


        return response()->json(['success' => 'Your document has been successfully updated.']);

    }
    public function request_cancel(RequestedDocument $request_id){
        date_default_timezone_set('Asia/Manila');
        
        $request_id->update([
            'status'    => 'CANCELLED',
        ]);
        return response()->json(['success' => 'Your document has been successfully cancelled.']);

    }

   

    public function requested_document(){
        $requests = RequestedDocument::where('resident_id', auth()->user()->resident->id)
                                        ->where('isRemove', 0)->latest()->get();
        return view('resident.requested.requested' , compact('requests'));
    }

    public function requested_edit(RequestedDocument $request){

        foreach($request->document->requirements()->get() as $requirement){
            $uploaded = RequestedDocumentRequirement::where('requested_document_id', $request->id)
                                          ->where('document_id', $request->document->id)
                                          ->where('document_requirement_id', $requirement->id)
                                          ->first();
            $requirements[] = array(
                'id'                        => $requirement->id,
                'name'                      => $requirement->name,
                'uploaded_requirement'      => $uploaded->name,
                 
            );
        }

        $requested_document[] = array(
            'document'             => $request->document->name, 
            'requirements'         => $requirements,
            'claiming_option'      => $request->claiming_option,
            'amount'               => $request->document->amount,
            'receipt_uploaded'     => $request->receipt,
        );



        return response()->json([
            'result' =>  $requested_document,
        ]);
    }

    public function filter($filter){
        if($filter == 'all'){
            $requests = RequestedDocument::where('resident_id', auth()->user()->resident->id)
                                            ->where('isRemove', 0)->latest()->get();
        }
        if($filter == 'pending'){
            $requests = RequestedDocument::where('resident_id', auth()->user()->resident->id)
                                            ->where('status', 'PENDING')
                                            ->where('isRemove', 0)->latest()->get();
        }
        if($filter == 'approved'){
            $requests = RequestedDocument::where('resident_id', auth()->user()->resident->id)
                                            ->where('status', 'APPROVED')
                                            ->where('isRemove', 0)->latest()->get();
        }
        if($filter == 'completed'){
            $requests = RequestedDocument::where('resident_id', auth()->user()->resident->id)
                                            ->where('status', 'COMPLETED')
                                            ->where('isRemove', 0)->latest()->get();
        }
        if($filter == 'cancelled'){
            $requests = RequestedDocument::where('resident_id', auth()->user()->resident->id)
                                            ->where('status', 'CANCELLED')
                                            ->where('isRemove', 0)->latest()->get();
        }
                    
        return view('resident.requested.requested-data' , compact('requests'));
    }


    
}
