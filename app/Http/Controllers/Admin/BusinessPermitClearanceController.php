<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessPermitClearance;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;

class BusinessPermitClearanceController extends Controller
{
   
    public function index()
    {
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            date_default_timezone_set('Asia/Manila');
            $dob = auth()->user()->date_of_birth;
            $age = Carbon::parse($dob)->diff(Carbon::now())->format('%y years old');
            
            $brgyCertificates = BusinessPermitClearance::where('isRemove', 0)->latest()->get();
            return view('admin.business_permit_clearance', compact('age', 'brgyCertificates'));
        }
        return abort('403');
    }

    public function store(Request $request)
    {
        
        
    }

    
    public function show(BusinessPermitClearance $businessPermitClearance)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $businessPermitClearance]);
        }
    }

  
    public function edit(BusinessPermitClearance $businessPermitClearance)
    {
        
    }

    public function update(Request $request, BusinessPermitClearance $businessPermitClearance)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'status' => ['required'],
            'comment' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
    
        BusinessPermitClearance::find($businessPermitClearance->id)->update([
            'status' => $request->input('status'),
            'comment' => $request->input('comment'),
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
    }

    public function destroy(BusinessPermitClearance $businessPermitClearance)
    {
        BusinessPermitClearance::find($businessPermitClearance->id)->update([
            'isRemove' => '1',
        ]);
        return response()->json(['success' => 'Removed Successfully.']);
    }
}
