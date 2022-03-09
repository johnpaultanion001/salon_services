<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resident;

class FinderResidentController extends Controller
{
    public function index(){
        return view('admin.finder_resident.finder_resident');
    }
    public function qr_result($qr_code){
        $resident = Resident::where('qr_code', $qr_code)->first();
        if($resident == null){
            return response()->json(
                ['no_data' =>  'No data']
            );
        }
        $residents[] = array(
            'id'                     => $resident->id,
            'name'                   => $resident->last_name.','.$resident->first_name.'('.$resident->middle_name.')', 
            'email'                  => $resident->user->email, 
            'contact_number'         => $resident->contact_number, 
            'address'                => $resident->address, 
            'status'                 => $resident->isApprove == 1 ? 'ACTIVE' : 'NOT ACTIVE',
            'status_color'           => $resident->isApprove == 1 ? 'bg-success' : 'bg-danger',
        );
        return response()->json(
            [
                'result' =>  $residents,
            ]
        );
    }
    public function pending_documents($qr_code){
        $resident = Resident::where('qr_code', $qr_code)->first();
        return view('admin.finder_resident.pending_documents', compact('resident'));
    }
}
