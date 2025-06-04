<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserProject; 
class UsersProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('user_project')->insert([
            ['user_id' => 1, 'projects_id' => 1],
            ['user_id' => 2, 'projects_id' => 2],
            ['user_id' => 3, 'projects_id' => 3],
            ['user_id' => 4, 'projects_id' => 4],
            ['user_id' => 5, 'projects_id' => 5],
        ]);
    }
}
