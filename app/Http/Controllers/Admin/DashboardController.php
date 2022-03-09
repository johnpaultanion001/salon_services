<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\RequestedDocument;


class DashboardController extends Controller
{
    public function index()
    {
        $documents = Document::where('isAvailable', true)->orderBy('name', 'asc')->get();
        $pendings =  RequestedDocument::where('status', 'PENDING')->latest()->get();
        return view('admin.dashboard' , compact('documents','pendings'));
    }
}
