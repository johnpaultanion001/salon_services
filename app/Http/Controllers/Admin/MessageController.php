<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\ServiceAppointment;

class MessageController extends Controller
{
    public function message(ServiceAppointment $appointment){

        $messages1 = Message::where('appointment_id', $appointment->id)
                                ->latest()->get();
        $no = 'n/a';
        if($messages1->count() < 1){
            return response()->json([
                'no_msg'      => 'No messages found',
                'customer'      => $appointment->customer->last_name.','.$appointment->customer->first_name,
                'service'      => $appointment->service->name,

            ]);
        }

        foreach($messages1 as $msg){
            $messages[] = array(
                'name'          => $msg->user->name ?? $msg->user->customer->first_name .' '. $msg->user->customer->last_name,
                'msg'           => $msg->message,
                'date_time'     => $msg->created_at->diffForHumans(),
            );
        }

        return response()->json([
            'messages'      => $messages,
            'customer'      => $appointment->customer->last_name.','.$appointment->customer->first_name,
            'service'      => $appointment->service->name,
        ]);
    }
    public function message_store(Request $request, ServiceAppointment $appointment){
        Message::create([
            'user_id'                   => auth()->user()->id,
            'appointment_id'     =>  $appointment->id,
            'message'                   => $request->input('message'),
        ]);

        return response()->json([
            'success'      => 'sent',
        ]);
    }
}
