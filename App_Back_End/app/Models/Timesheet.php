<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    protected $fillable = ['user_id', 'project_id', 'hours_worked', 'date'];

}
