<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BlogPost extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'tags',
        'publication_date',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumbnails')->singleFile();
    }

}
