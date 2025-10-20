<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\RevenueCategory;

class ExpenseByCategory extends ChartWidget
{
    protected static ?string $heading = 'Expense By Category';

    protected function getData(): array
    {
        // Get the current month and year
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Fetch expense transactions by category for the current month
        $expenseData = Transaction::selectRaw('transactions.category_id, SUM(transactions.amount) as total_expense')
            ->join(
                'revenue_categories',
                'transactions.category_id',
                '=',
                'revenue_categories.id'
            )
            ->where('transactions.type', 'expense') // Filter for expense transactions
            ->whereYear('transactions.created_at', $currentYear)
            ->whereMonth('transactions.created_at', $currentMonth)
            ->groupBy('transactions.category_id')
            ->get();

        // Prepare the labels and data for the pie chart
        $labels = [];
        $data = [];

        foreach ($expenseData as $expense) {
            // Fetch category name
            $category = RevenueCategory::find($expense->category_id);
            $labels[] = $category ? $category->name : 'Unknown Category';
            $data[] = $expense->total_expense;
        }

        return [
            'datasets' => [
                [
                    'data' => $data,
                    'backgroundColor' => [
                        '#FF6B6B', // Glossy Red
                        '#4D96FF', // Glossy Blue
                        '#FFD93D', // Glossy Yellow
                        '#6BCB77', // Glossy Green
                        '#FF9F68', // Glossy Orange
                        '#845EC2', // Glossy Purple
                        '#C34A36', // Glossy Brown
                        '#F9F871', // Glossy Light Yellow
                    ],
                    'borderColor' => '#FFFFFF', // Light white border for a subtle separation
                    'borderWidth' => 3, // Thicker border for a clean, modern look
                    'hoverBackgroundColor' => [
                        '#FF4D4D', // Vibrant Red on hover
                        '#3399FF', // Vibrant Blue on hover
                        '#FFCC33', // Vibrant Yellow on hover
                        '#45C653', // Vibrant Green on hover
                        '#FF793C', // Vibrant Orange on hover
                        '#7A4AB3', // Vibrant Purple on hover
                        '#B33D2B', // Vibrant Brown on hover
                        '#F7E850', // Vibrant Light Yellow on hover
                    ],
                    'hoverBorderColor' => '#F4F4F4', // Soft border highlight on hover (No black)
                    'hoverBorderWidth' => 4, // Enhanced hover border width
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
