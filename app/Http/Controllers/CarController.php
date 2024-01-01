<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\Manufacturer;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index() 
    {
        

        if (request('manufacturer_id') == null) {
             $cars= Car::all();
        } else {
            $cars= Car::where('manufacturer_id', request('manufacturer_id'))->get();
        }

        $manufacturers= Manufacturer::orderBy('name')->pluck('name', 'id')->prepend('All Manufacturers', '');
        return view('cars.index', compact('cars', 'manufacturers'));
    }

    public function create() {

        $manufacturers= Manufacturer::orderBy('name')->pluck('name', 'id')->prepend('All Manufacturers', '');
        return view('cars.create', compact('manufacturers'));
    }

    public function show($id) {
        
        $car = Car::find($id);
    return view ('cars.show', compact('car'));
    }

    public function store(Request $request) {

        $request->validate([
            'model'=>'required',
            'year'=>'required',
            'salesperson_email'=>'required|email',
            'manufacturer_id'=>'required|exists:manufacturers,id'
        ]);

        dd($request->all());
    }
}
