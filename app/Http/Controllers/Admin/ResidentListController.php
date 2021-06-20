<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ResidentListController extends Controller
{
    public function index()
    {
       
        $userrole = auth()->user()->role;
        if($userrole == 'admin'){
            $residents = User::where('role', 'resident')->latest()->get();
            return view('admin.residentlist', compact('residents'));
        }
        return abort('403');
    }
}
