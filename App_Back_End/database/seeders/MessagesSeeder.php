<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('messages')->insert([
            ['user_id' => 1, 'message_text' => 'Hello Alpha', 'time_sent' => now(), 'visible' => true, 'chat_id' => 1, 'new_column' => 0],
            ['user_id' => 2, 'message_text' => 'Hi Beta', 'time_sent' => now(), 'visible' => true, 'chat_id' => 2, 'new_column' => 1],
            ['user_id' => 3, 'message_text' => 'Greetings Gamma', 'time_sent' => now(), 'visible' => false, 'chat_id' => 3, 'new_column' => 2],
            ['user_id' => 4, 'message_text' => 'Hey Delta', 'time_sent' => now(), 'visible' => true, 'chat_id' => 4, 'new_column' => 3],
            ['user_id' => 5, 'message_text' => 'What’s up Epsilon', 'time_sent' => now(), 'visible' => false, 'chat_id' => 5, 'new_column' => 4],
        ]);
    }
}
