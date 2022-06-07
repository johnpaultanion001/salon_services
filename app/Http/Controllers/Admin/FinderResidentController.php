<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resident;
use App\Models\RequestedDocument;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class FinderResidentController extends Controller
{
    public function index(){
        abort_if(Gate::denies('staff_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $residents = Resident::where('isApprove', 1)->where('isRegister', 1)->orderBy('last_name' , 'asc')->first();
        return redirect('/admin/finder_resident/'.$residents->id);
    }
    public function resident_result(Resident $resident){
        $residents = Resident::where('isApprove', 1)->where('isRegister', 1)->orderBy('last_name' , 'asc')->get();
        $requested_documents = RequestedDocument::where('resident_id', $resident->id)->where('isRemove', 0)->latest()->get();
        $resident1 = Resident::where('id', $resident->id)->first();

        return view('admin.finder_resident', compact('resident1','residents','requested_documents'));
    }
   
}
