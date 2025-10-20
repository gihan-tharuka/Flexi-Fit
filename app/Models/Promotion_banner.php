<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Promotion_banner extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'promotion_banners';

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('promotion_banner_img')->singleFile();
    }
}
