<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use App\Models\BusinessPermitClearance;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use App\Models\Notification;

class BusinessPermitClearanceController extends Controller
{
   
    public function index()
    {
        date_default_timezone_set('Asia/Manila');
        $dob = auth()->user()->date_of_birth;
        $age = Carbon::parse($dob)->diff(Carbon::now())->format('%y years old');
        $userid = auth()->user()->id;
        $brgyCertificates = BusinessPermitClearance::where('user_id', $userid)->where('isRemove', 0)->latest()->get();

        return view('resident.business_permit_clearance', compact('age', 'brgyCertificates'));
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
        
        $onepending = BusinessPermitClearance::where('user_id', $userid)
                                        ->where('status', 0)
                                        ->where('isRemove', 0)
                                        ->get()->count();
        if($onepending > 0){
            return response()->json(['onepending' => 'You have already Pending Record, Wait for admin response']);
        }

        
        BusinessPermitClearance::create([
            'user_id' => $userid,
            'purpose' => $request->input('purpose'),
        ]);

        Notification::create([
            'user_id' => 1,
            'status' => "Added Business Permit Clearance by " .$username,
            'link' => "/admin/business_permit_clearance",
        ]);

        return response()->json(['success' => 'Added Successfully.']);
    }

   
    public function show(BusinessPermitClearance $businessPermitClearance)
    {
        //
    }

  
    public function edit(BusinessPermitClearance $businessPermitClearance)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $businessPermitClearance]);
        }
    }

  
    public function update(Request $request, BusinessPermitClearance $businessPermitClearance)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'purpose' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
    
        BusinessPermitClearance::find($businessPermitClearance->id)->update([
            'purpose' => $request->input('purpose'),
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
    }

   
    public function destroy(BusinessPermitClearance $businessPermitClearance)
    {
        BusinessPermitClearance::find($businessPermitClearance->id)->update([
            'isRemove' => '1',
        ]);
        return response()->json(['success' => 'Cancelled Successfully.']);
    }
}
