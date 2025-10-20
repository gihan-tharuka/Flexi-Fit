<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class our_team extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'our_teams';
    protected $fillable = ['name', 'position', 'description'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('our_team_photo')->singleFile();

    }
}
