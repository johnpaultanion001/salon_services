<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangayIndigency;
use Carbon\Carbon;
use Validator;

class BarangayIndigencyController extends Controller
{
  
    public function index()
    {
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            date_default_timezone_set('Asia/Manila');
            $dob = auth()->user()->date_of_birth;
            $age = Carbon::parse($dob)->diff(Carbon::now())->format('%y years old');
            
            $brgyCertificates = BarangayIndigency::where('isRemove', 0)->latest()->get();
            return view('admin.barangay_indigency', compact('age', 'brgyCertificates'));
        }
        return abort('403');
    }

  
    public function show(BarangayIndigency $barangayIndigency)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $barangayIndigency]);
        }
    }

    public function update(Request $request, BarangayIndigency $barangayIndigency)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'status' => ['required'],
            'comment' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
    
        BarangayIndigency::find($barangayIndigency->id)->update([
            'status' => $request->input('status'),
            'comment' => $request->input('comment'),
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
    }

  
    public function destroy(BarangayIndigency $barangayIndigency)
    {
        BarangayIndigency::find($barangayIndigency->id)->update([
            'isRemove' => '1',
        ]);
        return response()->json(['success' => 'Removed Successfully.']);
    }
}
