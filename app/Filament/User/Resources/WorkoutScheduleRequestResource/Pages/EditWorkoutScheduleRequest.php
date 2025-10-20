<?php

namespace App\Filament\User\Resources\WorkoutScheduleRequestResource\Pages;

use App\Filament\User\Resources\WorkoutScheduleRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorkoutScheduleRequest extends EditRecord
{
    protected static string $resource = WorkoutScheduleRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
