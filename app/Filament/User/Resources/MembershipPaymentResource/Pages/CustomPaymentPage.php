<?php

namespace App\Filament\User\Resources\MembershipPaymentResource\Pages;

use App\Filament\User\Resources\MembershipPaymentResource;
use Filament\Resources\Pages\Page;
use App\Models\MembershipPayment;

class CustomPaymentPage extends Page
{
    protected static string $resource = MembershipPaymentResource::class;

    protected static string $view = 'filament.user.resources.membership-payment-resource.pages.custom-payment-page';

    protected static ?string $title = 'View My Payment';

    // Add a new property to hold the current record
    public MembershipPayment $record;
}