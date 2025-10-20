<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevenueCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type'];

    public function transactions()
    {
        // return $this->hasMany(Transaction::class);
        return $this->hasMany(Transaction::class, 'category_id');
    }
}
