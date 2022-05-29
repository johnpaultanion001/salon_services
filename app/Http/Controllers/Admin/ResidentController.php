<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\resident;
use Illuminate\Http\Request;
use Validator;
use File;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification;

class ResidentController extends Controller
{
   
    public function index()
    {
        $residents = Resident::orderBy('last_name' , 'asc')->get();
        return view('admin.manage_residents',compact('residents'));
    }
    public function edit(Resident $resident)
    {
        if (request()->ajax()) {
            return response()->json([
                'result' =>  $resident,
                'email'  =>  $resident->user->email,
                'status' =>  $resident->isApprove,
            ]);
        }
    }

    public function update(Request $request, Resident $resident)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'address' => ['required'],
            'contact_number' => ['required', 'min:8','unique:residents,contact_number,' . $resident->id  ],
            'id_image' =>  ['mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'],

        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        
        if($resident->isApprove == 0){
            if($request->input('status') == 1){
                $emailContent = [
                    'notif'       => 'Your account has been approved',
                ];
        
                Mail::to($resident->user->email)
                        ->send(new Notification($emailContent));
            }
        }

        if ($request->file('id_image')) {
            File::delete(public_path('resident/img/id/'.$resident->id_image));
            $id = $request->file('id_image');
            $extension = $id->getClientOriginalExtension(); 
            $file_name_to_save = $request->input('last_name')."_".$resident->id.".".$extension;
            $id->move('resident/img/id/', $file_name_to_save);
        }

        $resident->update([
            'first_name'         => $request->input('first_name'),
            'middle_name'        => $request->input('middle_name'),
            'last_name'          => $request->input('last_name'),
            'address'            => $request->input('address'),
            'contact_number'     => $request->input('contact_number'),
            'id_image'           => $file_name_to_save ?? $resident->id_image,
            'isApprove'          => $request->input('status'),
        ]);
      
        return response()->json(['success' => 'Updated Successfully.']);
    }


}
