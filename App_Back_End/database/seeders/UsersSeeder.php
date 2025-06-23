<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'firstname' => 'Alice',
                'lastname' => 'Smith',
                'email' => 'alice@example.com',
                'password' => Hash::make('password'),
                'function_id' => 1,
                'role_id' => 1,
                'emergency_contact' => 'Jan Peeters',
                'contact_number' => '0499123456',
                'blood_type' => 'A+'
            ],
            [
                'firstname' => 'Bob',
                'lastname' => 'Jones',
                'email' => 'bob@example.com',
                'password' => Hash::make('password'),
                'function_id' => 2,
                'role_id' => 2,
                'emergency_contact' => 'Sofie De Bruyn',
                'contact_number' => '0488123456',
                'blood_type' => 'B+'
            ],
            [
                'firstname' => 'Carol',
                'lastname' => 'Taylor',
                'email' => 'carol@example.com',
                'password' => Hash::make('password'),
                'function_id' => 3,
                'role_id' => 1,
                'emergency_contact' => 'Tom Janssens',
                'contact_number' => '0477123456',
                'blood_type' => 'O-'
            ],
            [
                'firstname' => 'Dave',
                'lastname' => 'Brown',
                'email' => 'dave@example.com',
                'password' => Hash::make('password'),
                'function_id' => 1,
                'role_id' => 2,
                'emergency_contact' => 'Leen Van Damme',
                'contact_number' => '0466123456',
                'blood_type' => 'AB+'
            ],
            [
                'firstname' => 'Eve',
                'lastname' => 'White',
                'email' => 'eve@example.com',
                'password' => Hash::make('password'),
                'function_id' => 2,
                'role_id' => 1,
                'emergency_contact' => 'Peter Willems',
                'contact_number' => '0455123456',
                'blood_type' => 'A-'
            ],

        ]);
    }
}
