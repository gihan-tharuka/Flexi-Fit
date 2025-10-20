<?php

namespace App\Filament\User\Resources\MyscheduleResource\Pages;

use App\Filament\User\Resources\MyscheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMyschedules extends ListRecords
{
    protected static string $resource = MyscheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\CreateAction::make(),
        ];
    }
}
