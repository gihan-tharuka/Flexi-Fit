<?php

namespace App\Filament\Resources\ScheduleAssignmentResource\Pages;

use App\Filament\Resources\ScheduleAssignmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditScheduleAssignment extends EditRecord
{
    protected static string $resource = ScheduleAssignmentResource::class;

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