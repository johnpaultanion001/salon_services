<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resident;
use App\Models\User;
use App\Models\Document;
use Validator;
use File;
use Carbon\Carbon;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $documents = Document::where('isAvailable', true)->orderBy('name', 'asc')->get();   
        return view('resident.home', compact('documents'));
    }
    public function account()
    {
        abort_if(Gate::denies('resident_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('auth.account');
    }
    public function update(Request $request){
        date_default_timezone_set('Asia/Manila');

        if(auth()->user()->resident->isRegister == 0){
            $val_id = ['required','mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'];
        }
        else{
            $val_id = ['mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'];
        }
        $validated =  Validator::make($request->all(), [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'address' => ['required'],
            'contact_number' => ['required','unique:residents,contact_number,' . auth()->user()->resident->id  ],
            'id_image' =>  $val_id,

        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        if(auth()->user()->resident->isRegister == 0){
            $id = $request->file('id_image');
            $extension = $id->getClientOriginalExtension(); 
            $file_name_to_save = $request->input('last_name')."_".auth()->user()->resident->id.".".$extension;
            $id->move('resident/img/id/', $file_name_to_save);
        }else{
            if($request->file('id_image')){
                File::delete(public_path('resident/img/id/'.auth()->user()->resident->id_image));
                $id = $request->file('id_image');
                $extension = $id->getClientOriginalExtension(); 
                $file_name_to_save = $request->input('last_name')."_".auth()->user()->resident->id.".".$extension;
                $id->move('resident/img/id/', $file_name_to_save);
            }else{
                $file_name_to_save = auth()->user()->resident->id_image;
            }
           
        }

        Resident::where('user_id', auth()->user()->id)->update([
            'first_name'         => $request->input('first_name'),
            'last_name'          => $request->input('last_name'),
            'middle_name'        => $request->input('middle_name'),
            'address'            => $request->input('address'),
            'contact_number'     => $request->input('contact_number'),
            'id_image'           => $file_name_to_save,
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
