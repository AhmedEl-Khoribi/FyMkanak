<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;

class ServiceController extends Controller
{
    public function index()
    {
    	$services = Service::all();

    	return view('dashboard.services.services', compact('services'));
    }

    public function edit($id)
    {
    	$service = Service::find($id);

    	return view('dashboard.services.edit', compact('service'));
    }

    public function create()
    {
    	return view('dashboard.services.add');
    }

    public function update(Request $request, $id) 
    {
    	$this->validate(request(),[
            'name'=>'required',
            'desc'=>'required',
        ]);

        Service::where('id', $id)->update($request->except(['_token', '_method']));

        session()->flash('message', 'Service Is Updated');

        return redirect('/admin/service');

    }

    public function store(Request $request) 
    {
    	$this->validate(request(),[
            'name'=>'required',
            'desc'=>'required',
        ]);

        $service = new Service;
        $service->name = $request->name;
        $service->desc = $request->desc;
        $service->save();

        session()->flash('message', 'Service Is Created');

        return redirect('/admin/service');

    }

}
