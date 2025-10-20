<?php

namespace App\Filament\Resources\MembershipPaymentResource\Pages;

use App\Filament\Resources\MembershipPaymentResource;
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

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}