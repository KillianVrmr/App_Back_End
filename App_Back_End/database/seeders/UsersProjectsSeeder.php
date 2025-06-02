<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('user_project')->insert([
            ['user_id' => 1, 'project_id' => 1],
            ['user_id' => 2, 'project_id' => 2],
            ['user_id' => 3, 'project_id' => 3],
            ['user_id' => 4, 'project_id' => 4],
            ['user_id' => 5, 'project_id' => 5],
        ]);
    }
}
