<?php

namespace App\Filament\User\Resources\WorkoutLogResource\Pages;

use App\Filament\User\Resources\WorkoutLogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorkoutLog extends EditRecord
{
    protected static string $resource = WorkoutLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
