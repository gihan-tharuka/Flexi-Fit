<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Transaction; // Add this line to import the Transaction class
use Carbon\Carbon; // Add this line to import the Carbon class

class RevenueByMonth extends ChartWidget
{
    protected static ?string $heading = 'Revenue By Month';

    protected function getData(): array
    {

        // Query revenue data for the last 6 months (you can adjust this range)
        $revenues = Transaction::selectRaw('SUM(amount) as total_revenue, MONTH(date) as month, YEAR(created_at) as year')
        ->where('type', 'income')  // Ensure you're selecting income transactions only
            ->where('date', '>=', Carbon::now()->subMonths(6))  // Filter for the last 6 months
            ->groupBy('month', 'year')  // Group by month and year
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Prepare the data for the chart
        $labels = [];
        $data = [];

        // Loop through the revenue data and prepare the chart's labels and dataset
        foreach ($revenues as $revenue) {
            $labels[] = Carbon::create($revenue->year, $revenue->month, 1)->format('F Y');  // Format as "Month Year"
            $data[] = $revenue->total_revenue;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Revenue by Month',
                    'data' => $data,
                    'borderColor' => '#3b82f6',  // Line color
                    'fill' => false,  // Don't fill under the line
                    'lineTension' => 0.4,  // Smooth the line
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
