<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutLog extends Model
{
    use HasFactory;

    // protected $fillable = ['user_id', 'workout_id'];
    protected $fillable = ['user_id', 'workout_date','workout_name'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exerciseLogs()
    {
        return $this->hasMany(ExerciseLog::class);
    }

    // public function workout()
    // {
    //     return $this->belongsTo(Workout::class);
    // }

    // public function workoutLogDetails()
    // {
    //     return $this->hasMany(WorkoutLogDetail::class);
    // }
}