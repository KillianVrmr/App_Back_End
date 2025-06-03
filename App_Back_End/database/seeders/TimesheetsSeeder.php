<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TimeSheet; 
class TimesheetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('timesheets')->insert([
            ['user_id' => 1, 'project_id' => 1, 'hours_worked' => 5, 'date' => now()->toDateString()],
            ['user_id' => 2, 'project_id' => 2, 'hours_worked' => 8, 'date' => now()->toDateString()],
            ['user_id' => 3, 'project_id' => 3, 'hours_worked' => 6, 'date' => now()->toDateString()],
            ['user_id' => 4, 'project_id' => 4, 'hours_worked' => 4, 'date' => now()->toDateString()],
            ['user_id' => 5, 'project_id' => 5, 'hours_worked' => 7, 'date' => now()->toDateString()],
        ]);
    }
}
