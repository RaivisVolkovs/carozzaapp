<?php

namespace App\Http\Controllers;
use App\Models\Car;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index() 
    {
        $cars= Car::all();
        return view('cars.index', compact('cars'));
    }

    public function create() {
        return view('cars.create');
    }

    public function show($id) {
        
        $car = Car::find($id);
    return view ('cars.show', compact('car'));
    }
}
