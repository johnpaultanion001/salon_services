<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Validator;

class ServiceController extends Controller
{
   
    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $services = Service::orderBy('name', 'asc')->get();
        return view('admin.manage_services', compact('services'));
    }

   
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name'           => ['required'],
            'amount'           => ['required', 'numeric', 'min:1'],
            'description'           => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $document = Service::create([
            'name'                   => $request->input('name'),
            'amount'                 => $request->input('amount'),
            'description'                 => $request->input('description'),
            'isAvailable'                 => $request->input('isAvailable'),
        ]);


        return response()->json(['success' => 'Successfully created.']);
    }
   
    public function edit(Service $service)
    {
      

        return response()->json([
            'result' =>  $service,
        ]);
        
    }

   
    public function update(Request $request, Service $service)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name'           => ['required'],
            'amount'           => ['required', 'numeric', 'min:1'],
            'description'           => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $service->update([
            'name'                   => $request->input('name'),
            'amount'                 => $request->input('amount'),
            'description'                 => $request->input('description'),
            'isAvailable'            => $request->input('isAvailable'),
        ]);

        return response()->json(['success' => 'Successfully updated.']);


    }

   
    public function destroy(Document $document)
    {
        //
    }
}
