<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use App\Models\CertificateOfResidency;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;

class CertificateOfResidencyController extends Controller
{
  
    public function index()
    {
        date_default_timezone_set('Asia/Manila');
        $dob = auth()->user()->date_of_birth;
        $age = Carbon::parse($dob)->diff(Carbon::now())->format('%y years old');
        $userid = auth()->user()->id;
        $brgyCertificates = CertificateOfResidency::where('user_id', $userid)->where('isRemove', 0)->latest()->get();

        return view('resident.certificate_of_residency', compact('age', 'brgyCertificates'));
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
        
        $onepending = CertificateOfResidency::where('user_id', $userid)
                                        ->where('status', 0)
                                        ->where('isRemove', 0)
                                        ->get()->count();
        if($onepending > 0){
            return response()->json(['onepending' => 'You have already Pending Record, Wait for admin response']);
        }

        
        CertificateOfResidency::create([
            'user_id' => $userid,
            'purpose' => $request->input('purpose'),
        ]);
        return response()->json(['success' => 'Added Successfully.']);
    }

  
    public function show(CertificateOfResidency $certificateOfResidency)
    {
        //
    }

    
    public function edit(CertificateOfResidency $certificateOfResidency)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $certificateOfResidency]);
        }
    }

    public function update(Request $request, CertificateOfResidency $certificateOfResidency)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'purpose' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
    
        CertificateOfResidency::find($certificateOfResidency->id)->update([
            'purpose' => $request->input('purpose'),
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
    }

  
    public function destroy(CertificateOfResidency $certificateOfResidency)
    {
        CertificateOfResidency::find($certificateOfResidency->id)->update([
            'isRemove' => '1',
        ]);
        return response()->json(['success' => 'Cancelled Successfully.']);
    }
}
