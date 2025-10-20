<?php

namespace App\Filament\Resources\MembershipPaymentResource\Pages;

use App\Filament\Resources\MembershipPaymentResource;
use App\Models\MembershipPayment;
use App\Models\MembershipPlan;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMembershipPayment extends CreateRecord
{
    protected static string $resource = MembershipPaymentResource::class;


    protected function afterCreate(): void
    {
        // Get the last created MembershipPayment instance
        $membershipPayment = MembershipPayment::latest()->first();

        if ($membershipPayment) {
            $user = \App\Models\User::find($membershipPayment->user_id);

            if ($user) {
                 // Assuming each user has an assigned membership plan
                $membershipPlan = MembershipPlan::find($user->membership_id);
                $duration = $membershipPlan->duration;

                // Check if the user is currently active
                if ($user->status == 1) {
                    // Extend membership end date by the membership duration (e.g., 30 days)
                    $endDate = Carbon::parse($user->membership_end_date)->addDays($duration);

                    $user->update([
                        'membership_end_date' => $endDate->toDateString(),
                    ]);
                } else {
                    // Check if the user has a prior payment record

                    if ($user->membershipPayments()->exists()) {
                        $endDate = Carbon::parse($user->membership_end_date)->addDays($duration);
                        $user->update([
                            'membership_end_date' => $endDate->toDateString(),
                            'status' => 1, // Activate user
                        ]);

                    } else {
                        $user->update([

                            'status' => 1, // Activate user
                        ]);

                    }
                }

                // Log the transaction regardless of user type
                Transaction::create([
                    'amount' => $membershipPayment->amount,
                    'type' => 'income', // Assuming "income" type for membership payments
                    'description' => $user->name,
                    'category_id' => 1, // Assuming category_id 1 for membership payments
                    'date' => $membershipPayment->payment_date,
                    'payment_method' => $membershipPayment->payment_method,
                ]);
            }
        }
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }


}