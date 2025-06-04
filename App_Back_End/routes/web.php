<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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