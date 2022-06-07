<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function message(Request $request){
        Message::create([
            'user_id'                   => auth()->user()->id,
            'requested_document_id'     => $request->input('request_id'),
            'message'                   => $request->input('message'),
        ]);

        $messages1 = Message::where('requested_document_id', $request->input('request_id'))
                                ->where('user_id', auth()->user()->id)
                                ->latest()->get();

        foreach($messages1 as $msg){
            $messages[] = array(
                'name'          => $msg->user->name ?? $msg->user->resident->first_name .' '. $msg->user->resident->last_name, 
                'msg'           => $msg->message,
                'date_time'     => $msg->created_at->diffForHumans(),
            );
        }
        
        return response()->json([
            'messages'  => $messages,
            'request_id'  => $request->input('request_id'),
            'msg_count'  => $messages1->count() .' Messages',
        ]);
    }
}
