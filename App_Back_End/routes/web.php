<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Models\User;

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