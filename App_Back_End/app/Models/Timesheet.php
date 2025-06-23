<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    protected $fillable = ['user_id', 'project_id', 'hours_worked', 'date'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'user_project');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_project');
    }
}
