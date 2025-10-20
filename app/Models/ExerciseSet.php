<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseSet extends Model
{
    use HasFactory;

    protected $fillable = ['workout_log_detail_id', 'set_number', 'reps', 'weight'];

    public function workoutLogDetail()
    {
        return $this->belongsTo(WorkoutLogDetail::class);
    }
}
