<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\RequestedDocumentRequirement;
use App\Models\RequestedDocument;
use Validator;
use File;
use Carbon\Carbon;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::where('isAvailable', true)->orderBy('name', 'asc')->get();
        return view('resident.documents',compact('documents'));
    }

    public function request(Document $document){
        return view('resident.request',compact('document'));
    }

    public function request_store(Request $request, Document $document){
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'date_you_need'     => ['required', 'date', 'after:today'],
            'claiming_option'  => ['required'],
            'receipt'           => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $receipt = $request->file('receipt');
        $extension = $receipt->getClientOriginalExtension(); 
        $file_receipt = time().".".$extension;
        $receipt->move('resident/receipt/', $file_receipt);

        $request1 = RequestedDocument::create([
            'resident_id'       =>  auth()->user()->resident->id,
            'document_id'       =>  $document->id,
            'date_you_need'     =>  $request->input('date_you_need'),
            'amount_to_pay'     =>  $document->amount,
            'receipt'           =>  $file_receipt,
            'claiming_option'  =>  $request->input('claiming_option'),
        ]);

        foreach($request->file('requirement') as $requirement1 )
        {
            $requirement = $requirement1;
            $extension = $requirement->getClientOriginalExtension(); 
            $file_name_to_save = time().".".$extension;
            $requirement->move('resident/requirements/', $file_name_to_save);


            RequestedDocumentRequirement::updateOrCreate(
                [
                    'requested_document_id'    => $request1->id,
                    'document_id'              => $document->id,
                    'name'                     => $file_name_to_save,
                ],
                [
                    'requested_document_id'    => $request1->id,
                    'document_id'              => $document->id,
                    'name'                     => $file_name_to_save,
                ]
            );
        }
        return response()->json(['success' => 'Successfully Added Record.']);

    }

    public function requested_document(){
        $requests = RequestedDocument::where('resident_id', auth()->user()->resident->id)->where('isRemove', 0)->latest()->get();
        return view('resident.requested' , compact('requests'));
    }
    
}
