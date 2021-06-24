<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use App\Models\BarangayHealthCertificate;
use App\Models\Appointment;

class AppointmentController extends Controller
{

    public function index()
    {
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            date_default_timezone_set('Asia/Manila');
            $dob = auth()->user()->date_of_birth;
            $age = Carbon::parse($dob)->diff(Carbon::now())->format('%y years old');
            
            $brgyCertificates = Appointment::where('isRemove', 0)->latest()->get();
            return view('admin.appointments', compact('age', 'brgyCertificates'));
        }
        return abort('403');
    }

    public function show(Appointment $appointment)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $appointment]);
        }
    }

    public function update(Request $request, Appointment $appointment)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'status' => ['required'],
            'comment' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
    
        Appointment::find($appointment->id)->update([
            'status' => $request->input('status'),
            'comment' => $request->input('comment'),
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
    }

 
    public function destroy(Appointment $appointment)
    {
        Appointment::find($appointment->id)->update([
            'isRemove' => '1',
        ]);
        return response()->json(['success' => 'Removed Successfully.']);
    }
}
