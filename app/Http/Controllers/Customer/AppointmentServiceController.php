<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\RequestedDocumentRequirement;
use App\Models\RequestedDocument;
use App\Models\ServiceAppointment;
use App\Models\User;
use Validator;
use File;
use Carbon\Carbon;


class AppointmentServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('isAvailable', true)->orderBy('name', 'asc')->get();
        return view('customer.services',compact('services'));
    }

    public function appointment(Service $service){
        return view('customer.appointment',compact('service'));
    }

    public function appointment_store(Request $request, Service $service){
        date_default_timezone_set('Asia/Manila');

        $validated =  Validator::make($request->all(), [
            'appointment_date'  => ['required', 'date' , 'after:today'],
            'appointment_time'  => ['required'],
            'receipt'           => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $receipt = $request->file('receipt');
        $extension = $receipt->getClientOriginalExtension();
        $file_receipt = time().".".$extension;
        $receipt->move('customer/receipt/', $file_receipt);

        ServiceAppointment::create([
            'customer_id'       =>  auth()->user()->customer->id,
            'service_id'       =>  $service->id,
            'staff_id'       =>  $request->input('staff_id'),
            'appointment_date'       =>  $request->input('appointment_date'),
            'appointment_time'       =>  $request->input('appointment_time'),
            'note'       =>  $request->input('note'),
            'receipt'           =>  $file_receipt,
        ]);

        return response()->json(['success' => 'Your appointment has been successfully created.']);

    }

    public function manage_appointment(){
        $appointments = ServiceAppointment::where('customer_id', auth()->user()->customer->id)
                                        ->where('isRemove', 0)->latest()->get();
        $staffs = User::WhereNotIn('service_id', [""])->where('isAvailable', true)->orderBy('name', 'asc')->get();
        return view('customer.manage_appointment.appointment' , compact('appointments','staffs'));
    }

    public function filter($filter){
        if($filter == 'all'){
            $appointments = ServiceAppointment::where('customer_id', auth()->user()->customer->id)
                                ->where('isRemove', 0)->latest()->get();
        }
        if($filter == 'pending'){
            $appointments = ServiceAppointment::where('customer_id', auth()->user()->customer->id)
                                            ->where('status', 'PENDING')
                                            ->where('isRemove', 0)->latest()->get();
        }
        if($filter == 'approved'){
            $appointments = ServiceAppointment::where('customer_id', auth()->user()->customer->id)
                                            ->where('status', 'APPROVED')
                                            ->where('isRemove', 0)->latest()->get();
        }
        if($filter == 'completed'){
            $appointments = ServiceAppointment::where('customer_id', auth()->user()->customer->id)
                                            ->where('status', 'COMPLETED')
                                            ->where('isRemove', 0)->latest()->get();
        }
        if($filter == 'cancelled'){
            $appointments = ServiceAppointment::where('customer_id', auth()->user()->customer->id)
                                            ->where('status', 'CANCELLED')
                                            ->where('isRemove', 0)->latest()->get();
        }

        return view('customer.manage_appointment.data' , compact('appointments'));
    }






    public function appointment_edit(ServiceAppointment $appointment){

        $requested_document[] = array(
            'service'              => $appointment->service->name,
            'staff'                => $appointment->staff_id,
            'appointment_date'               => $appointment->appointment_date,
            'appointment_time'               => $appointment->appointment_time,
            'note'               => $appointment->note,
            'receipt_uploaded'     => $appointment->receipt,
        );



        return response()->json([
            'result' =>  $requested_document,
        ]);
    }

    public function appointment_update(Request $request ,ServiceAppointment $appointment){
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'appointment_date'  => ['required'],
            'appointment_time'  => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        if($request->file('receipt')){
            File::delete(public_path('customer/receipt/'.$appointment->receipt));
            $receipt = $request->file('receipt');
            $extension = $receipt->getClientOriginalExtension();
            $file_receipt = time().".".$extension;
            $receipt->move('customer/receipt/', $file_receipt);
        }


        $appointment->update([
            'staff_id'       =>  $request->input('staff_id'),
            'appointment_date'       =>  $request->input('appointment_date'),
            'appointment_time'       =>  $request->input('appointment_time'),
            'note'       =>  $request->input('note'),
            'receipt'           =>  $file_receipt ?? $appointment->receipt,
        ]);

        return response()->json(['success' => 'Your appointment has been successfully updated.']);

    }

    public function appointment_cancel(ServiceAppointment $appointment){
        date_default_timezone_set('Asia/Manila');

        $appointment->update([
            'status'    => 'CANCELLED',
        ]);
        return response()->json(['success' => 'Your appointment has been successfully cancelled.']);

    }





}
