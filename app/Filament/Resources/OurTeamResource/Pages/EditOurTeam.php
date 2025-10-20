<?php

namespace App\Filament\Resources\OurTeamResource\Pages;

use App\Filament\Resources\OurTeamResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurTeam extends EditRecord
{
    protected static string $resource = OurTeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return 'Edit Team Member';
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
