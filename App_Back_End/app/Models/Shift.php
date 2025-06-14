<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'project_id',
        'planned_start',
        'planned_end',
        'planned_break',
        'actual_start',
        'actual_end',
        'actual_break',
        'notes',
        'submitted_at',
    ];

    protected $dates = [
        'planned_start',
        'planned_end',
        'actual_start',
        'actual_end',
        'submitted_at',
    ];

    // Relaties
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Projects::class);
    }
}
