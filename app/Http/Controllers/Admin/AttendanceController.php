<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\StaffAttendance;
use Illuminate\Http\Request;
use Gate;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;
use Validator;

class AttendanceController extends Controller
{
    
    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $attendances = Attendance::latest()->get();
        return view('admin.manage_attendances', compact('attendances'));
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'title'           => ['required'],
            'description'           => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        Attendance::create([
            'title'                 => $request->input('title'),
            'description'                 => $request->input('description'),
            'user_id'                 => auth()->user()->id,
            'isActive'                 => $request->input('isActive'),
        ]);


        return response()->json(['success' => 'Successfully created.']);
    }
   
    public function edit(Attendance $attendance)
    {
        foreach($attendance->staffs_attendances()->get() as $attended){
            $attendeds[] = array(
                'name'          => $attended->staff->name ?? '',
                'time'          => $attended->created_at->format('h:i A') ?? '',
                
            );
        }

        return response()->json([
            'result' =>  $attendance,
            'attendeds' => $attendeds ?? [],
        ]);
        
    }

   
    public function update(Request $request, Attendance $attendance)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'title'           => ['required'],
            'description'           => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $attendance->update([
            'title'                 => $request->input('title'),
            'description'                 => $request->input('description'),
            'user_id'                 => auth()->user()->id,
            'isActive'                 => $request->input('isActive'),
        ]);

        return response()->json(['success' => 'Successfully updated.']);


    }

   
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return response()->json(['success' => 'Successfully removed.']);
    }


    public function my_attendance()
    {
        $attendances = Attendance::latest()->get();
        return view('staff.my_attendance', compact('attendances'));
    }

    public function attend($attendance)
    {
        StaffAttendance::updateOrCreate(
            [
                "staff_id" => auth()->user()->id,
                "attendance_id" => $attendance,
            ],
            [
                "staff_id" => auth()->user()->id,
                "attendance_id" => $attendance,
            ]
        );
        return response()->json(['success' => 'Successfully removed.']);
    }
    
}
