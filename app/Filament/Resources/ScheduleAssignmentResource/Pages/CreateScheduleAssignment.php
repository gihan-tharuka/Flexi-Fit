<?php

namespace App\Filament\Resources\ScheduleAssignmentResource\Pages;

use App\Filament\Resources\ScheduleAssignmentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateScheduleAssignment extends CreateRecord
{
    protected static string $resource = ScheduleAssignmentResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    public function getTitle(): string
    {
        return 'New Schedule Assignment';
    }
}
