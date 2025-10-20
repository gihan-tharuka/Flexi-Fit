<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;

class MembershipTypeDistribution extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    // protected function getData(): array
    // {
    //     return [
    //         //
    //     ];
    // }
    protected function getData(): array
    {
        // Fetch membership type distribution using join with MembershipPlan table
        $membershipData = User::selectRaw('membership_plans.name as membership_plan_name, COUNT(*) as count')
        ->join('membership_plans', 'users.membership_id', '=', 'membership_plans.id')
        ->groupBy('users.membership_id', 'membership_plans.name') // Include membership plan name in the GROUP BY
            ->get();

        $labels = [];
        $counts = [];

        foreach ($membershipData as $data) {
            // Adding the membership plan names and counts to arrays
            $labels[] = $data->membership_plan_name;
            $counts[] = $data->count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Number of Users',
                    'data' => $counts,
                    'backgroundColor' => ['#3b82f6', '#f97316', '#10b981', '#facc15'], // Customize colors
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
