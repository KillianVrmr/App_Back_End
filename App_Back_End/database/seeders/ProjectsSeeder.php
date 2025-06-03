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
            ['name' => 'Project Alpha', 'description' => 'Alpha Desc', 'location' => 'New York, USA', 'end_date' => now(), 'file_id' => 1],
            ['name' => 'Project Beta', 'description' => 'Beta Desc', 'location' => 'Tokyo, Japan', 'end_date' => now(), 'file_id' => 2],
            ['name' => 'Project Gamma', 'description' => 'Gamma Desc', 'location' => 'Berlin, Germany', 'end_date' => now(), 'file_id' => 3],
            ['name' => 'Project Delta', 'description' => 'Delta Desc', 'location' => 'São Paulo, Brazil', 'end_date' => now(), 'file_id' => 4],
            ['name' => 'Project Epsilon', 'description' => 'Epsilon Desc', 'location' => 'Cape Town, South Africa', 'end_date' => now(), 'file_id' => 5],
        ]);
    }
}
