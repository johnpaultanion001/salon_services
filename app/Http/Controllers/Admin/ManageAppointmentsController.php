<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceAppointment;
use Validator;
use File;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification;
use Gate;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;



class ManageAppointmentsController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $appointments = ServiceAppointment::where('isRemove', 0)->latest()->get();
        return view('admin.manage_appointments',compact('appointments'));
    }

    public function edit(ServiceAppointment $appointment){

        if (request()->ajax()) {
            return response()->json([
                'status'                    => $appointment->status,
                'uploaded_receipt'          => $appointment->receipt,
                'service'                   => $appointment->service->name,
                'staff'                     => $appointment->staff->name ?? "Any Available",
                'appointment_date'          => $appointment->appointment_date,
                'appointment_time'          => $appointment->appointment_time,
                'note'                      => $appointment->note,

                'customer'                  => $appointment->customer->last_name.','.$appointment->customer->first_name.'('.$appointment->customer->middle_name .')',
                'email'                     => $appointment->customer->user->email,
                'contact_number'                     => $appointment->customer->contact_number,
                'address'                     => $appointment->customer->address,

            ]);
        }

    }

    public function update(Request $request, ServiceAppointment $appointment){
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
           'status'  =>  ['required'],

        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        if($appointment->status != 'APPROVED'){
            if($request->input('status') == 'APPROVED'){
                $emailContent = [
                    'notif'          => 'Your appointment has been approved',
                    'msg'         => 'appointment_approved',
                    'appointment_id' => $appointment->id,
                    'service'       => $appointment->service->name,
                    'staff'       => $appointment->staff->name ?? "Any Available",
                    'appointment_date'  => Carbon::createFromFormat('Y-m-d',$appointment->appointment_date)->format('M j , Y'),
                    'appointment_time'  => $appointment->appointment_time

                ];

                Mail::to($appointment->customer->user->email)
                        ->send(new Notification($emailContent));
            }
        }

        if($appointment->status != 'COMPLETED'){
            if($request->input('status') == 'COMPLETED'){
                $emailContent = [
                    'notif'       => 'Your appointment has been completed',
                    'msg'         => 'appointment_completed',

                ];

                Mail::to($appointment->customer->user->email)
                        ->send(new Notification($emailContent));
            }
        }


        if($appointment->status != 'DECLINED'){
            if($request->input('status') == 'DECLINED'){
                $emailContent = [
                    'notif'       => 'Your appointment has been declined',
                    'msg'         => 'appointment_declined',
                ];

                Mail::to($appointment->customer->user->email)
                        ->send(new Notification($emailContent));
            }
        }

        $appointment->update([
            'status'         => $request->input('status'),

        ]);


        return response()->json(['success' => 'Updated Successfully.']);

    }


}
