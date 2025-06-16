<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{

    protected $fillable = ['name', 'description', 'location', 'end_date', 'file_id', 'contact_person', 'contact_phone'];

    protected $casts = [
        'end_date' => 'date', // <-- Add this line
    ];

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id');
    }
    
    public function getFilenameAttribute()
    {
        return $this->file ? $this->file->filename : null;
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



