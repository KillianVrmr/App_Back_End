<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['name' => 1],
            ['name' => 2],
            ['name' => 3],
            ['name' => 4],
            ['name' => 5],
        ]);
    }
}
