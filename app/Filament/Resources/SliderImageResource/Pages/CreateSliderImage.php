<?php

namespace App\Filament\Resources\SliderImageResource\Pages;

use App\Filament\Resources\SliderImageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSliderImage extends CreateRecord
{
    protected static string $resource = SliderImageResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
