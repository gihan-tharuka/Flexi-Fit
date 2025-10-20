<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Carbon\Carbon;
use App\Models\User;

class UsersByMonth extends ChartWidget
{

    protected static ?string $heading = 'Users By Month';

    protected function getData(): array
    {
        // Get the current month and year
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Get the first day and the last day of the current month
        $firstDayOfMonth = Carbon::now()->startOfMonth();
        $lastDayOfMonth = Carbon::now()->endOfMonth();

        // Get the count of new users registered per day in the current month
        $newUsersPerDay = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Prepare the labels (months) and the data (user counts)
        $labels = [];
        $data = [];

        foreach ($newUsersPerDay as $item) {
            $labels[] = Carbon::parse($item->month)->format('d M');
            $data[] = $item->count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'New Users',
                    'data' => $data,
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)', // Light Blue
                    'borderColor' => 'rgba(59, 130, 246, 1)', // Blue
                    'borderWidth' => 2,
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
