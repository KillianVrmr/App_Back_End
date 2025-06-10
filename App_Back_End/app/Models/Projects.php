<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Projects extends Model
{
    protected $fillable = ['name', 'description', 'contact', 'date', 'file_id'];

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_project');
    }

    public function timesheets() 
    {
        return $this->BelongsToMany(Timesheet::class);
    }
}
