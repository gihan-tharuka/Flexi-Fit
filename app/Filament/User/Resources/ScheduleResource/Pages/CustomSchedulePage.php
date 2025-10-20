<?php

namespace App\Filament\User\Resources\ScheduleResource\Pages;

use App\Filament\User\Resources\ScheduleResource;
use Filament\Resources\Pages\Page;
use App\Models\Schedule;

class CustomSchedulePage extends Page
{
    protected static string $resource = ScheduleResource::class;

    protected static string $view = 'filament.user.resources.schedule-resource.pages.custom-schedule-page';

    protected static ?string $title = 'View My Schedule';

    // Add a new property to hold the current record
    public Schedule $record;
}