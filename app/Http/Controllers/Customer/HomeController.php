<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use App\Models\Document;
use App\Models\Service;
use Validator;
use File;
use Carbon\Carbon;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('isAvailable', true)->orderBy('name', 'asc')->get();
        return view('customer.home', compact('services'));
    }
    public function send_msg(Request $request)
    {
        $emailContent = [
            'notif'          => 'Message from ' . $request->input('name'),
            'msg'            => 'send_msg',
            'email'           => $request->input('email'),
            'name'           => $request->input('name'),
            'body'           => $request->input('message'),
        ];

        Mail::to('ebarangayassistance@gmail.com')
                ->send(new Notification($emailContent));

        return response()->json(['success' => 'Successfully updated']);
    }
    public function account()
    {
        abort_if(Gate::denies('customer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('auth.account');
    }
    public function update(Request $request){
        date_default_timezone_set('Asia/Manila');

        $validated =  Validator::make($request->all(), [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'address' => ['required'],
            'contact_number' => ['required','unique:customers,contact_number,' . auth()->user()->customer->id  ],

        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }


        Customer::where('user_id', auth()->user()->id)->update([
            'first_name'         => $request->input('first_name'),
            'last_name'          => $request->input('last_name'),
            'middle_name'        => $request->input('middle_name'),
            'address'            => $request->input('address'),
            'contact_number'     => $request->input('contact_number'),
            'isRegister'         => true,
        ]);

        return response()->json(['success' => 'Successfully updated']);
    }

    public function passwordupdate(Request $request , User $user){
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'current_password' => ['required',new MatchOldPassword],
            'new_password' => ['required','min:8'],
            'confirm_password' => ['required','same:new_password'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        User::find($user->id)->update([
            'password' => Hash::make($request->input('new_password')),

        ]);
        return response()->json(['success' => 'Password changed successfully.']);
    }
}
