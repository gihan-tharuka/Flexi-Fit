<?php

namespace App\Filament\Resources\RevenueCategoryResource\Pages;

use App\Filament\Resources\RevenueCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRevenueCategories extends ListRecords
{
    protected static string $resource = RevenueCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
