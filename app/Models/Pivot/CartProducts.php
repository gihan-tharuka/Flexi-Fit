<?php

namespace App\Models\Pivot;

use App\Models\cart;
use App\Models\products;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CartProducts extends Pivot
{

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'tax',
        'price',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'tax' => 'decimal:2',
        'price' => 'decimal:2',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(products::class);
    }
}
