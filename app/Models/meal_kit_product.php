<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class meal_kit_product extends Pivot
{
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'meal_kit_id',
        'quantity',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(product::class);
    }

    public function mealKit(): BelongsTo
    {
        return $this->belongsTo(meal_kit::class);
    }
}
