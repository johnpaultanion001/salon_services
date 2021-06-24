<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use App\Models\BarangayIndigency;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;

class BarangayIndigencyController extends Controller
{
   
    public function index()
    {
        date_default_timezone_set('Asia/Manila');
        $dob = auth()->user()->date_of_birth;
        $age = Carbon::parse($dob)->diff(Carbon::now())->format('%y years old');
        $userid = auth()->user()->id;
        $brgyCertificates = BarangayIndigency::where('user_id', $userid)->where('isRemove', 0)->latest()->get();

        return view('resident.barangay_indigency', compact('age', 'brgyCertificates'));
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
        
        $onepending = BarangayIndigency::where('user_id', $userid)
                                        ->where('status', 0)
                                        ->where('isRemove', 0)
                                        ->get()->count();
        if($onepending > 0){
            return response()->json(['onepending' => 'You have already Pending Record, Wait for admin response']);
        }

        
        BarangayIndigency::create([
            'user_id' => $userid,
            'purpose' => $request->input('purpose'),
        ]);
        return response()->json(['success' => 'Added Successfully.']);
    }

    public function show(BarangayIndigency $barangayIndigency)
    {
        
    }

    
    public function edit(BarangayIndigency $barangayIndigency)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $barangayIndigency]);
        }
    }

    
    public function update(Request $request, BarangayIndigency $barangayIndigency)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'purpose' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
    
        BarangayIndigency::find($barangayIndigency->id)->update([
            'purpose' => $request->input('purpose'),
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
       
    }

    
    public function destroy(BarangayIndigency $barangayIndigency)
    {
        BarangayIndigency::find($barangayIndigency->id)->update([
            'isRemove' => '1',
        ]);
        return response()->json(['success' => 'Cancelled Successfully.']);
    }
}
