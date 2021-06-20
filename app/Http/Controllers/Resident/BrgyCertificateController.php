<?php
namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use App\Models\BrgyCertificate;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;

class BrgyCertificateController extends Controller
{
   
    public function index()
    {
        date_default_timezone_set('Asia/Manila');
        $dob = auth()->user()->date_of_birth;
        $age = Carbon::parse($dob)->diff(Carbon::now())->format('%y years old');
        $userid = auth()->user()->id;
        $brgyCertificates = BrgyCertificate::where('user_id', $userid)->where('isRemove', 0)->latest()->get();

        return view('resident.brgy_certificate', compact('age', 'brgyCertificates'));
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
        
        $onepending = BrgyCertificate::where('user_id', $userid)
                                        ->where('status', 0)
                                        ->where('isRemove', 0)
                                        ->get()->count();
        if($onepending > 0){
            return response()->json(['onepending' => 'You have already Pending Record, Wait for admin response']);
        }

        
        BrgyCertificate::create([
            'user_id' => $userid,
            'purpose' => $request->input('purpose'),
        ]);
        return response()->json(['success' => 'Added Successfully.']);
        
    }

    
    public function show(BrgyCertificate $brgyCertificate)
    {
    
    }

  
    public function edit(BrgyCertificate $brgyCertificate)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $brgyCertificate]);
        }
    }

    public function update(Request $request, BrgyCertificate $brgyCertificate)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'purpose' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
    
        BrgyCertificate::find($brgyCertificate->id)->update([
            'purpose' => $request->input('purpose'),
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
    }
    public function destroy(BrgyCertificate $brgyCertificate)
    {
        BrgyCertificate::find($brgyCertificate->id)->update([
            'isRemove' => '1',
        ]);
        return response()->json(['success' => 'Cancelled Successfully.']);
    }
}
