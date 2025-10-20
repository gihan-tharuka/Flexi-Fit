<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'status',
        'start_date',
        'end_date',
        'description',
        'promo_code',
        'discount',
        
    ];
}
