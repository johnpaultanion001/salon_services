<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use App\Models\BarangayHealthCertificate;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use App\Models\Notification;

class BarangayHealthCertificateController extends Controller
{
    
    public function index()
    {
        date_default_timezone_set('Asia/Manila');
        $dob = auth()->user()->date_of_birth;
        $age = Carbon::parse($dob)->diff(Carbon::now())->format('%y years old');
        $userid = auth()->user()->id;
        $brgyCertificates = BarangayHealthCertificate::where('user_id', $userid)->where('isRemove', 0)->latest()->get();

        return view('resident.barangay_health_certificate', compact('age', 'brgyCertificates'));
    }

   
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'purpose' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        $userid = auth()->user()->id;
        $username = auth()->user()->name;
        
        $onepending = BarangayHealthCertificate::where('user_id', $userid)
                                        ->where('status', 0)
                                        ->where('isRemove', 0)
                                        ->get()->count();
        if($onepending > 0){
            return response()->json(['onepending' => 'You have already Pending Record, Wait for admin response']);
        }

        
        BarangayHealthCertificate::create([
            'user_id' => $userid,
            'purpose' => $request->input('purpose'),
        ]);

        Notification::create([
            'user_id' => 1,
            'status' => "Added Barangay Health Certificate by " .$username,
            'link' => "/admin/barangay_health_certificate",
        ]);

        return response()->json(['success' => 'Added Successfully.']);
    }

  
    public function show(BarangayHealthCertificate $barangayHealthCertificate)
    {
       
    }

   
    public function edit(BarangayHealthCertificate $barangayHealthCertificate)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $barangayHealthCertificate]);
        }
    }

   
    public function update(Request $request, BarangayHealthCertificate $barangayHealthCertificate)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'purpose' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
    
        BarangayHealthCertificate::find($barangayHealthCertificate->id)->update([
            'purpose' => $request->input('purpose'),
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
    }

   
    public function destroy(BarangayHealthCertificate $barangayHealthCertificate)
    {
        BarangayHealthCertificate::find($barangayHealthCertificate->id)->update([
            'isRemove' => '1',
        ]);
        return response()->json(['success' => 'Cancelled Successfully.']);
    }
}
