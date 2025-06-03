<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MessageFile; 
class MessagesFilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('message_files')->insert([
            ['message_id' => 1, 'file_id' => 1],
            ['message_id' => 2, 'file_id' => 2],
            ['message_id' => 3, 'file_id' => 3],
            ['message_id' => 4, 'file_id' => 4],
            ['message_id' => 5, 'file_id' => 5],
        ]);
    }
}
