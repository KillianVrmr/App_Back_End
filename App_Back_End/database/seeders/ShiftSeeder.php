<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shift;
use App\Models\User;
use App\Models\Projects;
use Carbon\Carbon;

class ShiftSeeder extends Seeder
{
    public function run(): void
    {
        // Zorg ervoor dat er users en projecten bestaan
        $user = User::first(); // evt. met ->inRandomOrder()->first();
        $project = Projects::first();

        if (!$user || !$project) {
            $this->command->warn('⚠️ Geen gebruikers of projecten gevonden. Seeder gestopt.');
            return;
        }

        for ($i = 0; $i < 5; $i++) {
            $start = Carbon::now()->subDays($i)->setTime(8, 0);
            $end = Carbon::now()->subDays($i)->setTime(16, 0);

            Shift::create([
                'user_id' => $user->id,
                'project_id' => $project->id,
                'shift_date' => $start->toDateString(),
                'planned_start' => $start,
                'planned_end' => $end,
                'planned_break' => 30,

                // Nog geen 'actual' ingevuld = nog te registreren
                'notes' => null,
                'submitted_at' => null,
            ]);
        }
    }
}

