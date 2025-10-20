<?php

namespace App\Filament\User\Resources\MembershipPaymentResource\Pages;

use App\Filament\User\Resources\MembershipPaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMembershipPayment extends CreateRecord
{
    protected static string $resource = MembershipPaymentResource::class;
}
