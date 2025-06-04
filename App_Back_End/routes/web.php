<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AvailabilityController;
 
Route::get('/', function () {
    return view('welcome');
});
Route::get('/create_project', function () {
    return view('create_project');
});

Route::get('/availability', function () {
    return view('availability');
});


Route::get('/availability', [AvailabilityController::class, 'indexView']);
Route::get('/availability/data', [AvailabilityController::class, 'indexData']);
Route::post('/availability', [AvailabilityController::class, 'store']);
 