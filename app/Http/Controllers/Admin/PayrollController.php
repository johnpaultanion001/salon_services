<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payroll;
use App\Models\User;
use Illuminate\Http\Request;
use Gate;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;
use Validator;

class PayrollController extends Controller
{
    
    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $payrolls = Payroll::latest()->get();
        $staffs = User::WhereNotIn('service_id', [""])->where('isAvailable', true)->orderBy('name', 'asc')->get();
        return view('admin.manage_payroll', compact('payrolls','staffs'));
    }

   
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'staff_id'           => ['required'],
            'title'           => ['required'],
            'description'           => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        Payroll::create([
            'staff_id'                   => $request->input('staff_id'),
            'title'                 => $request->input('title'),
            'description'                 => $request->input('description'),
            'user_id'                 => auth()->user()->id,
        ]);


        return response()->json(['success' => 'Successfully created.']);
    }
   
    public function edit(Payroll $payroll)
    {
      

        return response()->json([
            'result' =>  $payroll,
        ]);
        
    }

   
    public function update(Request $request, Payroll $payroll)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'staff_id'           => ['required'],
            'title'           => ['required'],
            'description'           => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $payroll->update([
            'staff_id'                   => $request->input('staff_id'),
            'title'                 => $request->input('title'),
            'description'                 => $request->input('description'),
            'user_id'                 => auth()->user()->id,
        ]);

        return response()->json(['success' => 'Successfully updated.']);


    }

   
    public function destroy(Payroll $payroll)
    {
        $payroll->delete();
        return response()->json(['success' => 'Successfully removed.']);
    }

    public function my_payroll()
    {
        $payrolls = Payroll::where('staff_id', auth()->user()->id)->latest()->get();
        return view('staff.my_payroll', compact('payrolls'));
    }
}
