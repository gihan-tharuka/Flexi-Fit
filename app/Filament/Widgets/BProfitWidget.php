<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget\Card;

class BProfitWidget extends BaseWidget
{
    protected function getStats(): array
    {


        // Calculate total revenue from all income transactions (membership, services, products) for the current month
        $totalRevenue = Transaction::where('type', 'income')
        ->whereYear('date',
            now()->year
        )
        ->whereMonth('date', now()->month)
        ->sum('amount');  // Sum the 'amount' field to calculate total revenue

        //total expenses
        $totalExpenses = Transaction::where('type', 'expense')
        ->whereYear('date',
            now()->year
        )
        ->whereMonth('date', now()->month)
        ->sum('amount');  // Sum the 'amount' field to calculate total revenue

        //profit
        $profit = $totalRevenue - $totalExpenses;

        return [


            Card::make('Total Income', 'Rs ' . number_format($totalRevenue, 2))
                ->description('Revenue from memberships, services'),

            Card::make('Total Expenses', 'Rs ' . number_format($totalExpenses, 2))
                ->description('Expenses from memberships, services'),

            Card::make('Net Profit', 'Rs ' . number_format($profit, 2))
                ->description('Net Profit for the current month'),
        ];
    }
}
