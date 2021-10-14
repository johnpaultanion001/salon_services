<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use App\Models\BarangayHealthCertificate;
use App\Models\Notification;

class BarangayHealthCertificateController extends Controller
{
    
    public function index()
    {
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            date_default_timezone_set('Asia/Manila');
            $dob = auth()->user()->date_of_birth;
            $age = Carbon::parse($dob)->diff(Carbon::now())->format('%y years old');
            
            $brgyCertificates = BarangayHealthCertificate::where('isRemove', 0)->latest()->get();
            return view('admin.barangay_health_certificate', compact('age', 'brgyCertificates'));
        }
        return abort('403');
    }

    
    public function store(Request $request)
    {
        
    }

   
    public function show(BarangayHealthCertificate $barangayHealthCertificate)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $barangayHealthCertificate]);
        }
    }

    
    public function edit(BarangayHealthCertificate $barangayHealthCertificate)
    {
       
    }

    
    public function update(Request $request, BarangayHealthCertificate $barangayHealthCertificate)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'status' => ['required'],
            'comment' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
    
        BarangayHealthCertificate::find($barangayHealthCertificate->id)->update([
            'status' => $request->input('status'),
            'comment' => $request->input('comment'),
        ]);

        $status = $request->input('status');
        if($status == 0){
            $message = "Pending";
        }
        if($status == 1){
            $message = "Approved";
        }
        if($status == 2){
            $message = "Declined";
        }

        Notification::create([
            'user_id' =>  $barangayHealthCertificate->user_id,
            'status' => "Your Barangay Health Certificate has been " . $message,
            'link' => "/resident/barangay_health_certificate",
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
      
    }


    public function destroy(BarangayHealthCertificate $barangayHealthCertificate)
    {
        BarangayHealthCertificate::find($barangayHealthCertificate->id)->update([
            'isRemove' => '1',
        ]);
        return response()->json(['success' => 'Removed Successfully.']);
    }
}
