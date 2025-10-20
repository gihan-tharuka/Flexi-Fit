<?php

namespace App\Filament\Resources\OurTeamResource\Pages;

use App\Filament\Resources\OurTeamResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOurTeam extends CreateRecord
{
    protected static string $resource = OurTeamResource::class;

    protected static ?string $title = 'Create New Team Member';

    // In your CreateTeamMember.php
    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
