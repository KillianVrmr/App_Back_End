<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Availability; // Ensure you import the Availability model
class AvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('availability')->insert([
            ['user_id' => 1, 'date' => now()->toDateString(), 'available' => true],
            ['user_id' => 2, 'date' => now()->toDateString(), 'available' => false],
            ['user_id' => 3, 'date' => now()->toDateString(), 'available' => true],
            ['user_id' => 4, 'date' => now()->toDateString(), 'available' => true],
            ['user_id' => 5, 'date' => now()->toDateString(), 'available' => false],
        ]);
    }
}
