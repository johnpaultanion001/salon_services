<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('resident.home');
    }
       
   
    
}
