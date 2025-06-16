<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Message $message
    ) {}

    public function broadcastOn(): array
    {
        return [
            new Channel('chat'), 
        ];
    }

    public function broadcastWith(): array
    {
    return [
        'user' => [
            'firstname' => $this->message->user->firstname ?? 'User',
            'lastname' => $this->message->user->lastname ?? '',
        ],
        'message_text' => $this->message->message_text,
        'created_at' => $this->message->created_at->toISOString(),
    ];
}
}