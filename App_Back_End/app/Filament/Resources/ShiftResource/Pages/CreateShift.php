<?php

namespace App\Filament\Resources\ShiftResource\Pages;

use App\Filament\Resources\ShiftResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Carbon;

class CreateShift extends CreateRecord
{
    protected static string $resource = ShiftResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if ($data['shift_date'] && $data['planned_start']) {
            $data['planned_start'] = Carbon::parse("{$data['shift_date']} {$data['planned_start']}");
        }

        if ($data['shift_date'] && $data['planned_end']) {
            $data['planned_end'] = Carbon::parse("{$data['shift_date']} {$data['planned_end']}");
        }

        return $data;
    }
}
