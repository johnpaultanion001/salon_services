<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\RequestedDocument;
use App\Models\Resident;
use App\Models\RoleUser;
use Gate;
use Symfony\Component\HttpFoundation\Response;


class DashboardController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('staff_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $documents = Document::where('isAvailable', true)->orderBy('name', 'asc')->get();
        $pendings =  RequestedDocument::where('status', 'PENDING')->latest()->get();
        $residents = Resident::where('isApprove', 1)->where('isRegister', 1)->get();
        $staffs = RoleUser::where('role_id', 2)->orderBy('user_id', 'desc')->get();
        return view('admin.dashboard' , compact('documents','pendings','residents','staffs'));
    }
}
