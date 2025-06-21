<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role; 
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['name' => 1, 'guard_name' => 'web'],
            ['name' => 2, 'guard_name' => 'web'],
            ['name' => 3, 'guard_name' => 'web'],
            ['name' => 4, 'guard_name' => 'web'],
            ['name' => 5, 'guard_name' => 'web'],
        ]);
    }
}
