<?php

namespace App\Filament\Resources\ScheduleAssignmentResource\Pages;

use App\Filament\Resources\ScheduleAssignmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewScheduleAssignment extends ViewRecord
{
    protected static string $resource = ScheduleAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
