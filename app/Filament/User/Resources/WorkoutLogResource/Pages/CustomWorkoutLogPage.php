<?php

namespace App\Filament\User\Resources\WorkoutLogResource\Pages;

use App\Filament\User\Resources\WorkoutLogResource;
use Filament\Resources\Pages\Page;
use App\Models\WorkoutLog;

class CustomWorkoutLogPage extends Page
{
    protected static string $resource = WorkoutLogResource::class;



    protected static string $view = 'filament.user.resources.workout-log-resource.pages.custom-workout-log-page';

    protected static ?string $title = 'View My Workout Log';

    // Add a new property to hold the current record
    public WorkoutLog $record;

    // Load the workout log record when the page is initialized
    // public function mount($record)
    // {
    //     $this->record = WorkoutLog::findOrFail($record);
    // }
    // Override the page title

}