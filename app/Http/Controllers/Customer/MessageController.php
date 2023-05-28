<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function message(Request $request){
        Message::create([
            'user_id'                   => auth()->user()->id,
            'appointment_id'     => $request->input('appointment_id'),
            'message'                   => $request->input('message'),
        ]);

        $messages1 = Message::where('appointment_id', $request->input('appointment_id'))
                                ->where('user_id', auth()->user()->id)
                                ->latest()->get();

        foreach($messages1 as $msg){
            $messages[] = array(
                'name'          => $msg->user->name ?? $msg->user->customer->first_name .' '. $msg->user->customer->last_name,
                'msg'           => $msg->message,
                'date_time'     => $msg->created_at->diffForHumans(),
            );
        }

        return response()->json([
            'messages'  => $messages,
            'appointment_id'  => $request->input('appointment_id'),
            'msg_count'  => $messages1->count() .' Messages',
        ]);
    }
}
