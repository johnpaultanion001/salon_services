<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resident;
use App\Models\RequestedDocument;

class FinderResidentController extends Controller
{
    public function index(){
        $residents = Resident::where('isApprove', 1)->where('isRegister', 1)->orderBy('last_name' , 'asc')->first();
        return redirect('/admin/finder_resident/'.$residents->id);
    }
    public function resident_result(Resident $resident){
        $residents = Resident::where('isApprove', 1)->where('isRegister', 1)->orderBy('last_name' , 'asc')->get();
        $requested_documents = RequestedDocument::where('resident_id', $resident->id)->where('isRemove', 0)->latest()->get();
        return view('admin.finder_resident.finder_resident', compact('resident','residents','requested_documents'));
    }
    public function pending_documents($qr_code){
        
        $resident = Resident::where('qr_code', $qr_code)->first();
        return view('admin.finder_resident.pending_documents', compact('resident'));
    }
}
