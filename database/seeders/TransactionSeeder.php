<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RevenueCategory;
use App\Models\Transaction;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Revenue Categories
        $incomeCategories = [
            'Membership Fees',
            'Personal Training Fees',
            'Merchandise Sales',
        ];

        $expenseCategories = [
            'Equipment Maintenance',
            'Employee Salaries',
            'Rent',
            'Utilities',
        ];

        // Seed income categories
        foreach ($incomeCategories as $category) {
            RevenueCategory::create([
                'name' => $category,
                'type' => 'income',
            ]);
        }

        // Seed expense categories
        foreach ($expenseCategories as $category) {
            RevenueCategory::create([
                'name' => $category,
                'type' => 'expense',
            ]);
        }

        // Get categories for transactions
        $incomeCategoryIds = RevenueCategory::where('type', 'income')->pluck('id')->toArray();
        $expenseCategoryIds = RevenueCategory::where('type', 'expense')->pluck('id')->toArray();

        // Seed Transactions
        $transactions = [
            // Income transactions
            [
                'amount' => 500.00,
                'type' => 'income',
                'description' => 'Monthly membership fee',
                'category_id' => $incomeCategoryIds[array_rand($incomeCategoryIds)],
                'date' => Carbon::now()->subDays(10),
            ],
            [
                'amount' => 200.00,
                'type' => 'income',
                'description' => 'Personal training session',
                'category_id' => $incomeCategoryIds[array_rand($incomeCategoryIds)],
                'date' => Carbon::now()->subDays(5),
            ],
            [
                'amount' => 100.00,
                'type' => 'income',
                'description' => 'Gym merchandise sale',
                'category_id' => $incomeCategoryIds[array_rand($incomeCategoryIds)],
                'date' => Carbon::now()->subDays(2),
            ],

            // Expense transactions
            [
                'amount' => 150.00,
                'type' => 'expense',
                'description' => 'Equipment maintenance',
                'category_id' => $expenseCategoryIds[array_rand($expenseCategoryIds)],
                'date' => Carbon::now()->subDays(8),
            ],
            [
                'amount' => 1200.00,
                'type' => 'expense',
                'description' => 'Employee salaries',
                'category_id' => $expenseCategoryIds[array_rand($expenseCategoryIds)],
                'date' => Carbon::now()->subDays(7),
            ],
            [
                'amount' => 800.00,
                'type' => 'expense',
                'description' => 'Monthly rent',
                'category_id' => $expenseCategoryIds[array_rand($expenseCategoryIds)],
                'date' => Carbon::now()->subDays(6),
            ],
            [
                'amount' => 300.00,
                'type' => 'expense',
                'description' => 'Utilities',
                'category_id' => $expenseCategoryIds[array_rand($expenseCategoryIds)],
                'date' => Carbon::now()->subDays(3),
            ],
        ];

        foreach ($transactions as $transaction) {
            Transaction::create($transaction);
        }
    }
}