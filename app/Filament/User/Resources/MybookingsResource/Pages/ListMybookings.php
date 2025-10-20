<?php

namespace App\Filament\User\Resources\MybookingsResource\Pages;

use App\Filament\User\Resources\MybookingsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMybookings extends ListRecords
{
    protected static string $resource = MybookingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
