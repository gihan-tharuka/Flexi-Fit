<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class meal_kit extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'subscription_id',
    ];

    public function products()
    {
        return $this->belongsToMany(product::class)->using(meal_kit_product::class)->withPivot('quantity');
    }

    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }
}
