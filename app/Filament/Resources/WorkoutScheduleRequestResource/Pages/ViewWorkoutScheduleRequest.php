<?php

namespace App\Filament\Resources\WorkoutScheduleRequestResource\Pages;

use App\Filament\Resources\WorkoutScheduleRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewWorkoutScheduleRequest extends ViewRecord
{
    protected static string $resource = WorkoutScheduleRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
