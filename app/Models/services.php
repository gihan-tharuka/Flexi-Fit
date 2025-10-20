<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class services extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'services';
    protected $fillable = [
        'title',
        'description',
    ];


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('service_thumbnail')->singleFile();
    }


}
