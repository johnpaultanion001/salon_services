<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityLog;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ActivityLogController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $logs = ActivityLog::latest()->get();
        return view('admin.activity_logs' , compact('logs'));
    }
}
