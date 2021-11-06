<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Notification;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;



class AppointmentController extends Controller
{
    public $appiontments = [
        [
            'model'      => '\\App\\Models\\Appointment',
            'date_field' => 'date',
            'field'      => 'time',
            'user'      => 'name',
            'service'      => 'title',
            'prefix'     => 'You have appointment in this date',
            'suffix'     => '',
            'route'      => 'resident.appointments.index',
        ],
    ];
    
    public function index()
    {
        $events = [];
        $userid = auth()->user()->id;



        date_default_timezone_set('Asia/Manila');
        $dob = auth()->user()->date_of_birth;
        $age = Carbon::parse($dob)->diff(Carbon::now())->format('%y years old');
        $userid = auth()->user()->id;
        $appointments1 = Appointment::where('user_id', $userid)->where('isRemove', 0)->latest()->get();

        foreach ($this->appiontments as $source) {
            $appointments = Appointment::where('status', '0')
                                ->where('user_id', $userid)
                                ->whereBetween('date', [Carbon::now()->subDays(1), "2099-01-01"])
                                ->where('isRemove', 0)
                                ->get();              
            foreach ($appointments as $model) {
                $crudFieldValue = $model->getOriginal($source['date_field']);

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => $model->{$source['field']} ,
                    'start' => $crudFieldValue, 
                    'url'   => route($source['route'], $model->id),
                    'backgroundColor' => '#008C1F',
                    'borderColor'    => '#008C1F',
                ];
            }
        }
        foreach ($this->appiontments as $source) {
            $appointments = Appointment::where('status', '0')
                                    ->where('user_id', $userid)
                                    ->whereBetween('date', ["2001-01-01",Carbon::now()->subDays(1)])
                                    ->where('isRemove', 0)
                                    ->get();              
            foreach ($appointments as $model) {
                $crudFieldValue = $model->getOriginal($source['date_field']);

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => 'Past Due'.' '  .$model->{$source['field']},
                    'start' => $crudFieldValue, 
                    'textColor'    => '#fff',
                    'backgroundColor' => '#FF0000',
                    'borderColor'    => '#FF0000',
                ];
            }
        }

        $events[] = [
            'title' => 'Past Date',
            'start' => '2000-01-01',
            'end' =>  date('Y-m-d',strtotime("+1 days")),
            'textColor'    => '#fff',
            'backgroundColor' => '#FF0000',
            'borderColor'    => '#FF0000',
        ];
        

        return view('resident.appointments', compact('age', 'appointments1' , 'events'));
    }

  
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'date' => ['required','after:yesterday'],
            'time' => ['required'],
            'purpose' => ['required'],
            'type_of_appointment' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        $userid = auth()->user()->id;
        $username = auth()->user()->name;
        
        $onepending = Appointment::where('user_id', $userid)
                                        ->where('status', 0)
                                        ->where('isRemove', 0)
                                        ->get()->count();
        if($onepending > 0){
            return response()->json(['onepending' => 'You have already Pending Record, Wait for admin response']);
        }

        $noofficetime = array("12:00 AM", "1:00 AM" ,"2:00 AM" ,"3:00 AM","4:00 AM" ,"5:00 AM","6:00 AM" ,"7:00 AM","8:00 AM" 
                            ,"5:00 PM","6:00 PM","7:00 PM","8:00 PM","9:00 PM","10:00 PM","11:00 PM"); 
        if (in_array($request->time, $noofficetime))
        {
            return response()->json(['noofficetime' => 'The Office open time are 9:00 AM TO 5:00 PM']);
        }

        
        Appointment::create([
            'user_id' => $userid,
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'purpose' => $request->input('purpose'),
            'type_of_appointment' => $request->input('type_of_appointment'),
        ]);

        Notification::create([
            'user_id' => 1,
            'status' => "Added appointment by " .$username,
            'link' => "/admin/appointments",
        ]);

        return response()->json(['success' => 'Added Successfully.']);
    }

   
    public function show(Appointment $appointment)
    {
        //
    }

   
    public function edit(Appointment $appointment)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $appointment]);
        }
    }

    
    public function update(Request $request, Appointment $appointment)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'date' => ['required','after:yesterday'],
            'time' => ['required'],
            'purpose' => ['required'],
            'type_of_appointment' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
  

        $noofficetime = array("12:00 AM", "1:00 AM" ,"2:00 AM" ,"3:00 AM","4:00 AM" ,"5:00 AM","6:00 AM" ,"7:00 AM","8:00 AM" 
        ,"5:00 PM","6:00 PM","7:00 PM","8:00 PM","9:00 PM","10:00 PM","11:00 PM"); 
        if (in_array($request->time, $noofficetime))
        {
        return response()->json(['noofficetime' => 'The Office open time are 9:00 AM TO 5:00 PM']);
        }


        Appointment::find($appointment->id)->update([
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'purpose' => $request->input('purpose'),
            'type_of_appointment' => $request->input('type_of_appointment'),
        ]);
        return response()->json(['success' => 'Updated Successfully.']);
    }

    public function destroy(Appointment $appointment)
    {
        Appointment::find($appointment->id)->update([
            'isRemove' => '1',
        ]);
        return response()->json(['success' => 'Cancelled Successfully.']);
    }
}
