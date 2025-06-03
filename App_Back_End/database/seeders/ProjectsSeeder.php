<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Projects; 
class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Projects::insert([
            ['name' => 'Project Alpha', 'description' => 'Alpha Desc', 'location' => 'New York, USA', 'end_date' => now(), 'file_id' => 1,"contact_person" => "John Doe", "contact_phone" => "123-456-7890"],
            ['name' => 'Project Beta', 'description' => 'Beta Desc', 'location' => 'Tokyo, Japan', 'end_date' => now(), 'file_id' => 2, "contact_person" => "Jane Smith", "contact_phone" => "987-654-3210"],	
            ['name' => 'Project Gamma', 'description' => 'Gamma Desc', 'location' => 'Berlin, Germany', 'end_date' => now(), 'file_id' => 3, "contact_person" => "Alice Johnson", "contact_phone" => "555-123-4567"],
            ['name' => 'Project Delta', 'description' => 'Delta Desc', 'location' => 'São Paulo, Brazil', 'end_date' => now(), 'file_id' => 4, "contact_person" => "Bob Brown", "contact_phone" => "444-987-6543"],
            ['name' => 'Project Epsilon', 'description' => 'Epsilon Desc', 'location' => 'Cape Town, South Africa', 'end_date' => now(), 'file_id' => 5,"contact_person" => "Charlie White", "contact_phone" => "333-456-7890"],
            ['name' => 'Project Zeta', 'description' => 'Zeta Desc', 'location' => 'Sydney, Australia', 'end_date' => now(), 'file_id' => 6, "contact_person" => "Diana Green", "contact_phone" => "222-654-3210"],
        ]);
    }
}
