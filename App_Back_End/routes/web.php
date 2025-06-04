<?php

use Illuminate\Support\Facades\Route;
 
Route::get('/', function () {
    return view('welcome');
});
Route::get('/create_project', function () {
    return view('create_project');
});

//for testing
Route::get('/sidebar', function () {
    return view('components.sidebar');
});