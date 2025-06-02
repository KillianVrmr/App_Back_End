<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Function; // Ensure you import the Function model

class FunctionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Function::insert([
            ['name' => 1],
            ['name' => 2],
            ['name' => 3],
            ['name' => 4],
            ['name' => 5],
        ]);
    }
}
