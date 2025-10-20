<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class MembershipPlan extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $fillable = ['name', 'price', 'duration', 'discount_price', 'description', 'discount'];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('membership_thumbnail')->singleFile();
    }

}
