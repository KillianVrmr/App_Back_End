<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $table = 'availability';

    protected $fillable = ['user_id', 'date', 'available'];
}
