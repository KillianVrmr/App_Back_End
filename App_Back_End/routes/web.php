<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\ProjectController;
use App\Models\User;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create_project', function () {
    return view('create_project');
})->name('create_project');


Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

Route::get('/dashboard', function (\Illuminate\Http\Request $request) {
    $location = $request->query('location');
    $projects = \App\Models\Projects::query();

    if ($location) {
        $projects->where('location', 'like', '%' . $location . '%');
    }

    $projects = $projects->get();

    return view('dashboard', compact('projects', 'location'));
})->name('dashboard');

Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.project');

Route::get('/projects/{project}/crew', function (\App\Models\Projects $project) {
    $project->load('users');
    $users = User::all(); 
    return view('projects.crew', compact('project', 'users'));
})->name('projects.crew');

Route::post('/projects/{project}/assign-crew', [ProjectController::class, 'assignCrew'])->name('projects.assignCrew');




Route::get('/projects/{project}/chat', function (\App\Models\Projects $project) {
    return view('projects.chat', compact('project'));
})->name('projects.chat');

Route::post('/projects/{project}/chat', [ProjectController::class, 'storeMessage'])->name('projects.chat.store');
Route::get('/projects/{project}/chat/messages', [ProjectController::class, 'fetchMessages'])->name('projects.chat.fetch');






Route::middleware('guest')->group(function() {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::get('/availability', function () {
    return view('availability');
});


Route::get('/availability', [AvailabilityController::class, 'indexView']);
Route::get('/availability/data', [AvailabilityController::class, 'indexData']);
Route::post('/availability', [AvailabilityController::class, 'store']);
 
Route::middleware('auth')->group(function() {
    Route::get('/logout', [AuthController::class, 'showLogoutForm'])->name('logout');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout.get');
    });
 

//for testing
Route::get('/sidebar', function () {
    return view('components.sidebar');
});

