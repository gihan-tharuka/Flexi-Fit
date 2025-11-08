<?php

namespace App\Filament\Resources\MembershipPlanResource\Pages;

use App\Filament\Resources\MembershipPlanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMembershipPlan extends ViewRecord
{
    protected static string $resource = MembershipPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
