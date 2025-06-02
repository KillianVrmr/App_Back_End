<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([
            ['name' => 'view_projects'],
            ['name' => 'edit_projects'],
            ['name' => 'delete_projects'],
            ['name' => 'view_users'],
            ['name' => 'assign_roles'],
        ]);
    }
}
