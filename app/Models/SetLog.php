<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetLog extends Model
{
    use HasFactory;

    protected $fillable = ['exercise_log_id', 'reps', 'weight'];

    public function exerciseLog()
    {
        return $this->belongsTo(ExerciseLog::class);
    }
}