<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Car;

class CarController extends Controller
{
    public function index()
    {
    	$cars = Car::all();

    	return view('dashboard.cars.cars', compact('cars'));
    }

    public function edit($id)
    {
    	$car = Car::find($id);

    	return view('dashboard.cars.edit', compact('car'));
    }

    public function create()
    {
    	return view('dashboard.cars.add');
    }

    public function update(Request $request, $id) 
    {
    	$this->validate(request(),[
            'name'=>'required',
            'desc'=>'required',
        ]);

        Car::where('id', $id)->update($request->except(['_token', '_method']));

        session()->flash('message', 'Car Is Updated');

        return redirect('/admin/car');

    }

    public function store(Request $request) 
    {
    	$this->validate(request(),[
            'name'=>'required',
            'desc'=>'required',
        ]);

        $car = new Car;
        $car->name = $request->name;
        $car->desc = $request->desc;
        $car->save();

        session()->flash('message', 'Car Is Created');

        return redirect('/admin/car');

    }
}
