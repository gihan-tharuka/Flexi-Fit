<?php

namespace App\Filament\User\Resources\WorkoutLogResource\Pages;

use App\Filament\User\Resources\WorkoutLogResource;
use App\Models\Exercise_Volume;
use App\Models\WorkoutLog;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Http\Request;

class CreateWorkoutLog extends CreateRecord
{
    protected static string $resource = WorkoutLogResource::class;




}
