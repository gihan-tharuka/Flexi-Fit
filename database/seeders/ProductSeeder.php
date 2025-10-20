<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Gold Standard 100% Whey',
                'price' => 59.99,
                'discount_price' => 49.99,
                'tags' => 'protein, whey, muscle',
                'in_stock' => 1,
                'stock_quantity' => 100,
                'on_sale' => 1,
                'bestselling' => 1,
                'description' => 'The world\'s best-selling whey protein powder',
                'category_id' => 1, // Protein Powders
                'brand_id' => 1, // Optimum Nutrition
            ],
            [
                'name' => 'Platinum Pre-Workout',
                'price' => 39.99,
                'discount_price' => 34.99,
                'tags' => 'preworkout, energy, focus',
                'in_stock' => 1,
                'stock_quantity' => 75,
                'on_sale' => 0,
                'bestselling' => 1,
                'description' => 'Advanced pre-workout formula for intense training',
                'category_id' => 3, // Pre-Workout
                'brand_id' => 2, // MuscleTech
            ],
            [
                'name' => 'Nitrotech Whey Protein',
                'price' => 54.99,
                'discount_price' => null,
                'tags' => 'protein, lean muscle',
                'in_stock' => 1,
                'stock_quantity' => 50,
                'on_sale' => 0,
                'bestselling' => 0,
                'description' => 'Pure whey protein isolate for lean muscle',
                'category_id' => 1, // Protein Powders
                'brand_id' => 2, // MuscleTech
            ],
            [
                'name' => 'C4 Original Pre-Workout',
                'price' => 29.99,
                'discount_price' => 24.99,
                'tags' => 'preworkout, energy, endurance',
                'in_stock' => 1,
                'stock_quantity' => 120,
                'on_sale' => 1,
                'bestselling' => 1,
                'description' => 'The original pre-workout formula',
                'category_id' => 3, // Pre-Workout
                'brand_id' => 4, // Cellucor
            ],
            [
                'name' => 'Multivitamin Pro',
                'price' => 19.99,
                'discount_price' => 15.99,
                'tags' => 'vitamins, health, wellness',
                'in_stock' => 1,
                'stock_quantity' => 200,
                'on_sale' => 1,
                'bestselling' => 0,
                'description' => 'Complete daily multivitamin formula',
                'category_id' => 2, // Vitamins & Minerals
                'brand_id' => 1, // Optimum Nutrition
            ],
        ];

        foreach ($products as $product) {
            product::create($product);
        }
    }
}
