<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    use InteractsWithMedia;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'discount_price',
        'tags',
        'in_stock',
        'stock_quantity',
        'on_sale',
        'bestselling',
        'description',
        'category_id',
        'brand_id',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(ProductBrand::class, 'brand_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('product_image')->singleFile();
        $this->addMediaCollection('nutrition_label')->singleFile();
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }





}
