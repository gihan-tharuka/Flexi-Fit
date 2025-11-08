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
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
