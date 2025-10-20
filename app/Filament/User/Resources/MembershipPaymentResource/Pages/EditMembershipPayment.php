<?php

namespace App\Filament\User\Resources\MembershipPaymentResource\Pages;

use App\Filament\User\Resources\MembershipPaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMembershipPayment extends EditRecord
{
    protected static string $resource = MembershipPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
