<?php

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
}
