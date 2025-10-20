<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'payment_date',
        'payment_method',
        'collected_by' // Staff member who collected the payment
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
