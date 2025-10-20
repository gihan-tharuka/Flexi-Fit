<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'type', 'description', 'category_id', 'date', 'payment_method'];

    public function revenuecategory()
    {
        // return $this->belongsTo(RevenueCategory::class);
        return $this->belongsTo(RevenueCategory::class, 'category_id');
    }

    // Add a scope for income
    public function scopeIncome($query)
    {
        return $query->where('type', 'income');
    }

    // Add a scope for expense
    public function scopeExpense($query)
    {
        return $query->where('type', 'expense');
    }
}
