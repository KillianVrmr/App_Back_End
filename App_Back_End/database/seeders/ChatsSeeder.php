<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('chats')->insert([
            ['name' => 'Alpha Chat', 'project_id' => 1],
            ['name' => 'Beta Chat', 'project_id' => 2],
            ['name' => 'Gamma Chat', 'project_id' => 3],
            ['name' => 'Delta Chat', 'project_id' => 4],
            ['name' => 'Epsilon Chat', 'project_id' => 5],
        ]);
    }
}
