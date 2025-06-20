<?php
namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Controllers\ProjectController;

class ProjectNav extends Component
{
    public $projects;

    public function __construct()
    {
        $this->projects = \App\Models\Project::all();
    }

    public function render()
    {
        return view('components.project-nav');
    }
}