<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Validator;

class FeedbackController extends Controller
{

    public function index(Request $request){
        $feedbacks = Feedback::latest()->get();
        return view('admin.manage_feedbacks', compact('feedbacks'));
    }
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'feedback'           => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

       $feed = Feedback::create([
            'user_id'                   => auth()->user()->id,
            'appointment_id'                        => $request->input('appointment_id'),
            'feedback'                  => $request->input('feedback'),
        ]);

        $feedbacks[] = array(
            'name'          => $feed->user->customer->first_name .' '. $feed->user->customer->last_name,
            'feedback'           => $feed->feedback,
            'date_time'     => $feed->created_at->diffForHumans(),
        );

        return response()->json([
            'feedbacks'  => $feedbacks,
            'appointment_id'  => $request->input('appointment_id'),
        ]);
    }
}
