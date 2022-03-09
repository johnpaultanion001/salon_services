<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestedDocument;

class RequestedDocumentController extends Controller
{
    public function requested_document(RequestedDocument $requested){
        if (request()->ajax()) {
            return response()->json([
                'resident'          => $requested->resident->last_name.','.$requested->resident->first_name.'('.$requested->resident->middle_name.')', 
                'document'          => $requested->document->name,
                'requirement'       => $requested->document->requirements,

                'amount'            => $requested->document->amount,

                'payment_paid'      => $requested->isPaid == 1 ? 'btn-success text-white' : '',
                'payment_unpaid'    => $requested->isPaid == 0 ? 'btn-danger text-white' : '',
                'requested_id'      => $requested->id,

                'status_pending'    => $requested->status == 'PENDING' ? 'btn-warning text-white' : '',
                'status_approved'   => $requested->status == 'APPROVED' ? 'btn-success text-white' : '',
                'status_completed'  => $requested->status == 'COMPLETED' ? 'btn-primary text-white' : '',
                'status_canceled'   => $requested->status == 'CANCELED' ? 'btn-danger text-white' : '',

            ]);
        }
        
    }
    public function payment_status(Request $request){
        $requested_document = RequestedDocument::where('id',$request->get('id'))->first();
        $requested_document->update([
            'isPaid'    => $request->get('payment_value')
        ]);
        return response()->json([
            'payment_paid'      => $requested_document->isPaid == 1 ? 'btn-success text-white' : '',
            'payment_unpaid'    => $requested_document->isPaid == 0 ? 'btn-danger text-white' : '',
            'requested_id'      => $requested_document->id,
        ]);
    } 

    public function status(Request $request){
        $requested_document = RequestedDocument::where('id',$request->get('id'))->first();
        $requested_document->update([
            'status'    => $request->get('status_value')
        ]);
        return response()->json([
            'status_pending'    => $requested_document->status == 'PENDING' ? 'btn-warning text-white' : '',
            'status_approved'   => $requested_document->status == 'APPROVED' ? 'btn-success text-white' : '',
            'status_completed'  => $requested_document->status == 'COMPLETED' ? 'btn-primary text-white' : '',
            'status_canceled'   => $requested_document->status == 'CANCELED' ? 'btn-danger text-white' : '',
            'requested_id'      => $requested_document->id,

        ]);
    }
    
}
