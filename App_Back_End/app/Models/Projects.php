<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
