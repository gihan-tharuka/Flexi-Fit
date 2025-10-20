<?php

namespace App\Filament\Resources\SliderImageResource\Pages;

use App\Filament\Resources\SliderImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSliderImages extends ListRecords
{
    protected static string $resource = SliderImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
