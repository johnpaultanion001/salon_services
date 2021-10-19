<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use App\Models\BorrowItem;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use App\Models\Notification;

class BorrowItemController extends Controller
{
    public $borrows1 = [
        [
            'model'      => '\\App\\Models\\BorrowItem',
            'date_field' => 'date',
            'field'      => 'time',
            'user'      => 'name',
            'service'      => 'title',
            'prefix'     => 'You have record in this date',
            'suffix'     => '',
            'route'      => 'resident.borrow.index',
        ],
    ];

    public function index()
    {
        $events = [];
        $userid = auth()->user()->id;
        date_default_timezone_set('Asia/Manila');

        $userid = auth()->user()->id;
        $borrows = BorrowItem::where('user_id', $userid)->where('isRemove', 0)->latest()->get();

        foreach ($this->borrows1 as $source) {
            $BorrowItems = BorrowItem::where('status', '0')
                                ->where('user_id', $userid)
                                ->whereBetween('date', [Carbon::now()->subDays(1), "2099-01-01"])
                                ->where('isRemove', 0)
                                ->get();              
            foreach ($BorrowItems as $model) {
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
        foreach ($this->borrows1 as $source) {
            $BorrowItems = BorrowItem::where('status', '0')
                                    ->where('user_id', $userid)
                                    ->whereBetween('date', ["2001-01-01",Carbon::now()->subDays(1)])
                                    ->where('isRemove', 0)
                                    ->get();              
            foreach ($BorrowItems as $model) {
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
        

        return view('resident.borrow', compact('borrows' , 'events'));
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
        ]);

        if($request->input('purpose') == "Funeral"){
            $validated =  Validator::make($request->all(), [
                'date' => ['required','after:yesterday'],
                'end_of_funeral' => ['required','after:date'],
                'time' => ['required'],
                'purpose' => ['required'],
            ]);
        }

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        

        $userid = auth()->user()->id;
        $username = auth()->user()->name;
        
        $onepending = BorrowItem::where('user_id', $userid)
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

        
        BorrowItem::create([
            'user_id' => $userid,
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'purpose' => $request->input('purpose'),
            'end_of_funeral' =>  $request->input('end_of_funeral'),
        ]);

        Notification::create([
            'user_id' => 1,
            'status' => "Added Borrow Item by " .$username,
            'link' => "/admin/borrow",
        ]);

        return response()->json(['success' => 'Added Successfully.']);
    }
    public function show(BorrowItem $borrow)
    {
        //
    }
    public function edit(BorrowItem $borrow)
    {
        if (request()->ajax()) {
            return response()->json([
             'result' => $borrow,
             'eof' => $borrow->purpose,
            ]);
        }
    }
    public function update(Request $request, BorrowItem $borrow)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'date' => ['required','after:yesterday'],
            'time' => ['required'],
            'purpose' => ['required'],
        ]);
        if($request->input('purpose') == "Funeral"){
            $validated =  Validator::make($request->all(), [
                'date' => ['required','after:yesterday'],
                'end_of_funeral' => ['required','after:date'],
                'time' => ['required'],
                'purpose' => ['required'],
            ]);
        }
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
  

        $noofficetime = array("12:00 AM", "1:00 AM" ,"2:00 AM" ,"3:00 AM","4:00 AM" ,"5:00 AM","6:00 AM" ,"7:00 AM","8:00 AM" 
        ,"5:00 PM","6:00 PM","7:00 PM","8:00 PM","9:00 PM","10:00 PM","11:00 PM"); 
        if (in_array($request->time, $noofficetime))
        {
            return response()->json(['noofficetime' => 'The Office open time are 9:00 AM TO 5:00 PM']);
        }


        BorrowItem::find($borrow->id)->update([
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'purpose' => $request->input('purpose'),
            'end_of_funeral' =>  $request->input('end_of_funeral'),
        ]);
        return response()->json(['success' => 'Updated Successfully.']);
    }
    public function destroy(BorrowItem $borrow)
    {
        BorrowItem::find($borrow->id)->update([
            'isRemove' => '1',
        ]);
        return response()->json(['success' => 'Cancelled Successfully.']);
    }
}
