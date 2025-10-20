<?php

namespace Database\Seeders;

use App\Models\ProductBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name' => 'Optimum Nutrition'],
            ['name' => 'MuscleTech'],
            ['name' => 'BSN'],
            ['name' => 'Cellucor'],
            ['name' => 'JYM Supplement Science'],
        ];

        foreach ($brands as $brand) {
            ProductBrand::create($brand);
        }

    }
}
