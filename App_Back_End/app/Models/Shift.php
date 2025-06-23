<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
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

    protected $casts = [
    'planned_start' => 'datetime',
    'planned_end' => 'datetime',
    'shift_date' => 'date',
];

    // Relaties
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
