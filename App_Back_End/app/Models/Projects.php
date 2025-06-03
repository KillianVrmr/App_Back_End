<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'location', 'end_date', 'file_id', 'contact_person', 'contact_phone'];	

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_project');
    }
}
