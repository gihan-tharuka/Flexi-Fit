<?php

namespace App\Filament\User\Resources\ScheduleAssignmentResource\Pages;

use App\Filament\User\Resources\ScheduleAssignmentResource;
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
}
