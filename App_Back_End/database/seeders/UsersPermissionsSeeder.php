<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserPermissions; // Ensure you import the UserPermission model
class UsersPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('user_permissions')->insert([
            ['user_id' => 1, 'permission_id' => 1],
            ['user_id' => 2, 'permission_id' => 2],
            ['user_id' => 3, 'permission_id' => 3],
            ['user_id' => 4, 'permission_id' => 4],
            ['user_id' => 5, 'permission_id' => 5],
        ]);
    }
}
