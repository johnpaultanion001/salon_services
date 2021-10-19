<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BorrowItem;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use App\Models\Notification;

class BorrowItemController extends Controller
{
    
    public function index()
    {
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            date_default_timezone_set('Asia/Manila');
            $borrows = BorrowItem::where('isRemove', 0)->latest()->get();
            return view('admin.borrow', compact('borrows'));
        }
        return abort('403');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
       
    }
    public function show(BorrowItem $borrow)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $borrow]);
        }
    }
    public function edit(BorrowItem $borrow)
    {
        
    }
    public function update(Request $request, BorrowItem $borrow)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'status' => ['required'],
            'comment' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
    
        BorrowItem::find($borrow->id)->update([
            'status' => $request->input('status'),
            'comment' => $request->input('comment'),
        ]);
        
        $status = $request->input('status');
        if($status == 0){
            $message = "Pending";
        }
        if($status == 1){
            $message = "Approved";
        }
        if($status == 2){
            $message = "Declined";
        }
        if($status == 3){
            $message = "Completed";
        }

        Notification::create([
            'user_id' => $borrow->user_id,
            'status' => "Your borrowed has been " . $message,
            'link' => "/resident/borrow",
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
    }
    public function destroy(BorrowItem $borrow)
    {
        BorrowItem::find($borrow->id)->update([
            'isRemove' => '1',
        ]);
        return response()->json(['success' => 'Removed Successfully.']);
    }
}
