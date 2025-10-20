<?php

namespace App\Filament\Resources\WorkoutScheduleRequestResource\Pages;

use App\Filament\Resources\WorkoutScheduleRequestResource;
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
    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
