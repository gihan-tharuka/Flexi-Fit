<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Transaction;

class ActiveMembershipsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        //total users
        $totalUsers = User::count();

        $activeMembershipsCount = User::where('status', 1)
            // ->whereNotNull('membership_end_date')
            // ->whereDate('membership_end_date', '>', now())
            ->count();

        $deactiveMembershipsCount = User::where('status', 0)
        // ->whereNotNull('membership_end_date')
        // ->whereDate('membership_end_date', '>', now())
        ->count();




        return [
            Card::make('Total Users', $totalUsers)
                ->description('Registered users')
                ->descriptionIcon('heroicon-o-users')
                ->color('success'),

            Card::make('Active Memberships', $activeMembershipsCount)
                ->description('Currently active')
                ->descriptionIcon('heroicon-o-users')
                ->color('success'),

            Card::make('Expired Memberships', $deactiveMembershipsCount)
                ->description('Currently Expired')
                ->descriptionIcon('heroicon-o-users')
                ->color('danger'),


        ];
    }
}
