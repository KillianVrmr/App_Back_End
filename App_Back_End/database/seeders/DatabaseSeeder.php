<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
         $this->call([
        FunctionsSeeder::class,
        RolesSeeder::class,
        PermissionsSeeder::class,
        RolesPermissionsSeeder::class,
        FilesSeeder::class,
        UsersSeeder::class,
        ProjectsSeeder::class,
        UsersProjectsSeeder::class,
        ChatsSeeder::class,
        MessagesSeeder::class,
        AvailabilitySeeder::class,
        UsersPermissionsSeeder::class,
        MessagesFilesSeeder::class,
        TimesheetsSeeder::class,
        ]);
        
    }
}
