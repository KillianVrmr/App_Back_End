<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'chat_id',
        'user_id',
        'visible',
        'message_text',
        'time_sent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
