<?php

namespace App\Filament\Resources\ShiftResource\Pages;

use App\Filament\Resources\ShiftResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Carbon;

class EditShift extends EditRecord
{
    protected static string $resource = ShiftResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

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
