<?php

namespace App\Filament\Pages;
use App\Models\Shift;

use Filament\Pages\Page;

class Planner extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.planner';

    public function getCalendarEvents(): array
    {
    return Shift::with(['users', 'project'])->get()->map(function ($shift) {
        return [
            'title' => $shift->project->name,
                'extendedProps' => [
                'users' => $shift->users->pluck('name')->join(', ')
],
            'start' => $shift->planned_start->format('Y-m-d\TH:i:s'),
            'end' => $shift->planned_end?->format('Y-m-d\TH:i:s'),
        ];
    })->toArray();
    }

}

