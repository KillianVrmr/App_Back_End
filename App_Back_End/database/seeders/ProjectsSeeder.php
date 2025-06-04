<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Projects; 
class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Projects::insert([
            ['name' => 'Project Alpha', 'description' => 'Alpha Desc', 'contact' => 'alice@example.com', 'date' => now(), 'file_id' => 1],
            ['name' => 'Project Beta', 'description' => 'Beta Desc', 'contact' => 'bob@example.com', 'date' => now(), 'file_id' => 2],
            ['name' => 'Project Gamma', 'description' => 'Gamma Desc', 'contact' => 'carol@example.com', 'date' => now(), 'file_id' => 3],
            ['name' => 'Project Delta', 'description' => 'Delta Desc', 'contact' => 'dave@example.com', 'date' => now(), 'file_id' => 4],
            ['name' => 'Project Epsilon', 'description' => 'Epsilon Desc', 'contact' => 'eve@example.com', 'date' => now(), 'file_id' => 5],
        ]);
    }
}
