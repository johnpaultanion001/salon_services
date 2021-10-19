<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrgyCertificate;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use App\Models\Notification;

class BrgyCertificateController extends Controller
{
   
    public function index()
    {
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            date_default_timezone_set('Asia/Manila');
            $dob = auth()->user()->date_of_birth;
            $age = Carbon::parse($dob)->diff(Carbon::now())->format('%y years old');
            
            $brgyCertificates = BrgyCertificate::where('isRemove', 0)->latest()->get();
            return view('admin.brgy_certificate', compact('age', 'brgyCertificates'));
        }
        return abort('403');
    }

    public function store(Request $request)
    {
        
        
    }

    
    public function show(BrgyCertificate $brgyCertificate)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $brgyCertificate]);
        }
    }

  
    public function edit(BrgyCertificate $brgyCertificate)
    {
        
    }

    public function update(Request $request, BrgyCertificate $brgyCertificate)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'status' => ['required'],
            'comment' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
    
        BrgyCertificate::find($brgyCertificate->id)->update([
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
        if($status == 3){
            $message = "Claimed";
        }

        Notification::create([
            'user_id' => $brgyCertificate->user_id,
            'status' => "Your Brgy Certificate has been " . $message,
            'link' => "/resident/brgy_certificate",
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
    }

    public function destroy(BrgyCertificate $brgyCertificate)
    {
        BrgyCertificate::find($brgyCertificate->id)->update([
            'isRemove' => '1',
        ]);
        return response()->json(['success' => 'Removed Successfully.']);
    }
}
