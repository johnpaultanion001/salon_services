<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceAppointment;
use App\Models\Customer;
use App\Models\RoleUser;
use Gate;
use Symfony\Component\HttpFoundation\Response;


class DashboardController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $services = Service::where('isAvailable', true)->orderBy('name', 'asc')->get();
        $pendings =  ServiceAppointment::where('status', 'PENDING')->latest()->get();
        $customers = Customer::where('status', "APPROVED")->where('isRegister', 1)->get();
        $staffs = RoleUser::where('role_id', 2)->orderBy('user_id', 'desc')->get();
        return view('admin.dashboard' , compact('services','pendings','customers','staffs'));
    }
}
