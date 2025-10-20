<?php

namespace App\Filament\Resources\ScheduleAssignmentResource\Pages;

use App\Filament\Resources\ScheduleAssignmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListScheduleAssignments extends ListRecords
{
    protected static string $resource = ScheduleAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
