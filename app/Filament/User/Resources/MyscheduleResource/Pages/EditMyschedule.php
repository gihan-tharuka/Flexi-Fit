<?php

namespace App\Filament\User\Resources\MyscheduleResource\Pages;

use App\Filament\User\Resources\MyscheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMyschedule extends EditRecord
{
    protected static string $resource = MyscheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
