<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'schedule_id',
        'notes', // Add this line
    ];


    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }
}
