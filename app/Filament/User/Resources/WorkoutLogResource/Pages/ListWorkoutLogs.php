<?php

namespace App\Filament\User\Resources\WorkoutLogResource\Pages;

use App\Filament\User\Resources\WorkoutLogResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorkoutLogs extends ListRecords
{
    protected static string $resource = WorkoutLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
