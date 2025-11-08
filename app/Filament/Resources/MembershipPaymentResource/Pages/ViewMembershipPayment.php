<?php

namespace App\Filament\Resources\MembershipPaymentResource\Pages;

use App\Filament\Resources\MembershipPaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMembershipPayment extends ViewRecord
{
    protected static string $resource = MembershipPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
