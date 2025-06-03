<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Functions extends Model
{
    protected $table = 'functions';

    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class, 'function_id');
    }
}
