<?php

namespace App\Filament\Resources\RevenueCategoryResource\Pages;

use App\Filament\Resources\RevenueCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRevenueCategory extends EditRecord
{
    protected static string $resource = RevenueCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
