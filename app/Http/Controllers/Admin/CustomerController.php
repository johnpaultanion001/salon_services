<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Validator;
use File;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{

    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $customers = Customer::where('isRegister', true)->orderBy('last_name' , 'asc')->get();
        return view('admin.manage_customers',compact('customers'));
    }
    public function edit(Customer $customer)
    {
        if (request()->ajax()) {
            return response()->json([
                'result' =>  $customer,
                'email'  =>  $customer->user->email,
                'status' =>  $customer->status,
            ]);
        }
    }

    public function update(Request $request, Customer $customer)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'address' => ['required'],
            'contact_number' => ['required', 'min:8','unique:customers,contact_number,' . $customer->id  ],

        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }


        $customer->update([
            'first_name'         => $request->input('first_name'),
            'middle_name'        => $request->input('middle_name'),
            'last_name'          => $request->input('last_name'),
            'address'            => $request->input('address'),
            'contact_number'     => $request->input('contact_number'),
        ]);


        return response()->json(['success' => 'Updated Successfully.']);
    }


}
