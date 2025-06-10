<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AvailabilityController;

Route::get('/availability', [AvailabilityController::class, 'indexData']);
Route::post('/availability', [AvailabilityController::class, 'store']);
