<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cars', function() {
    return "All cars";
});

Route::get('cars/create', function() {
    return "Add cars";
});

Route::get('cars/{id}', function($id) {
    return App\Models\Car::find($id);
});