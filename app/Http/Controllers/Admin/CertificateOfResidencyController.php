<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CertificateOfResidency;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use App\Models\Notification;

class CertificateOfResidencyController extends Controller
{
   
    public function index()
    {
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            date_default_timezone_set('Asia/Manila');
            $dob = auth()->user()->date_of_birth;
            $age = Carbon::parse($dob)->diff(Carbon::now())->format('%y years old');
            
            $brgyCertificates = CertificateOfResidency::where('isRemove', 0)->latest()->get();
            return view('admin.certificate_of_residency', compact('age', 'brgyCertificates'));
        }
        return abort('403');

       
    }

    public function store(Request $request)
    {
        
        
    }

    
    public function show(CertificateOfResidency $certificateOfResidency)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $certificateOfResidency]);
        }
    }

  
    public function edit(CertificateOfResidency $certificateOfResidency)
    {
        
    }

    public function update(Request $request, CertificateOfResidency $certificateOfResidency)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'status' => ['required'],
            'comment' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
    
        CertificateOfResidency::find($certificateOfResidency->id)->update([
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
            'user_id' => $certificateOfResidency->user_id,
            'status' => "Your Certificate Of Residency has been " . $message,
            'link' => "/resident/certificate_of_residency",
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
    }

    public function destroy(CertificateOfResidency $certificateOfResidency)
    {
        CertificateOfResidency::find($certificateOfResidency->id)->update([
            'isRemove' => '1',
        ]);
        return response()->json(['success' => 'Removed Successfully.']);
    }
}
