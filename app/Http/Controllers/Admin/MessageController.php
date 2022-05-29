<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\RequestedDocument;

class MessageController extends Controller
{
    public function message(RequestedDocument $requested){
        
        $messages1 = Message::where('requested_document_id', $requested->id)
                                ->latest()->get();

        foreach($messages1 as $msg){
            $messages[] = array(
                'name'          => $msg->user->name ?? $msg->user->resident->first_name .' '. $msg->user->resident->last_name, 
                'msg'           => $msg->message,
            );
        }
        
        return response()->json([
            'messages'      => $messages,
            'resident'      => $requested->resident->last_name.','.$requested->resident->first_name.'('.$requested->resident->middle_name .')', 
            'document'      => $requested->document->name,
        ]);
    }
    public function message_store(Request $request, RequestedDocument $requested){
        Message::create([
            'user_id'                   => auth()->user()->id,
            'requested_document_id'     =>  $requested->id,
            'message'                   => $request->input('message'),
        ]);

        return response()->json([
            'success'      => 'sent',
        ]);
    }
}
