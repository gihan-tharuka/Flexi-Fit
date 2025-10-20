<?php

namespace App\Filament\User\Resources\MyOrderResource\Pages;

use App\Filament\User\Resources\MyOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMyOrders extends ListRecords
{
    protected static string $resource = MyOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\CreateAction::make(),
        ];
    }
}
