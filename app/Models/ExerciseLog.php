<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'workout_log_id',
        'exercise_name',
    ];

    public function workoutLog()
    {
        return $this->belongsTo(WorkoutLog::class);
    }

    public function setLogs()
    {
        return $this->hasMany(SetLog::class);
    }
}