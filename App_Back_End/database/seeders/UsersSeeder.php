<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            ['firstname' => 'Alice', 'lastname' => 'Smith', 'email' => 'alice@example.com', 'password' => Hash::make('password'), 'function_id' => 1, 'role_id' => 1, 'emergency_contact' => '1234567890', 'blood_type' => 'A+'],
            ['firstname' => 'Bob', 'lastname' => 'Jones', 'email' => 'bob@example.com', 'password' => Hash::make('password'), 'function_id' => 2, 'role_id' => 2, 'emergency_contact' => '2345678901', 'blood_type' => 'B+'],
            ['firstname' => 'Carol', 'lastname' => 'Taylor', 'email' => 'carol@example.com', 'password' => Hash::make('password'), 'function_id' => 3, 'role_id' => 1, 'emergency_contact' => '3456789012', 'blood_type' => 'O-'],
            ['firstname' => 'Dave', 'lastname' => 'Brown', 'email' => 'dave@example.com', 'password' => Hash::make('password'), 'function_id' => 1, 'role_id' => 2, 'emergency_contact' => '4567890123', 'blood_type' => 'AB+'],
            ['firstname' => 'Eve', 'lastname' => 'White', 'email' => 'eve@example.com', 'password' => Hash::make('password'), 'function_id' => 2, 'role_id' => 1, 'emergency_contact' => '5678901234', 'blood_type' => 'A-'],
        ]);
    }
}
