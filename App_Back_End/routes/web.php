<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function() {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function() {
    Route::get('/logout', [AuthController::class, 'showLogoutForm'])->name('logout');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout.post');
    });
 
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