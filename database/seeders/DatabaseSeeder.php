<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\MembershipPlan;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this -> call([
            MembershipPlanSeeder::class,
        ]);

        $this->call([
            UserSeeder::class,
        ]);



        $this -> call([
            TwoDayBeginnerScheduleSeeder::class,
        ]);

        $this -> call([
           ProductCategorySeeder::class,
        ]);

        $this -> call([
            ProductBrandSeeder::class,
            SheduleDataSeeder::class,
        ]);

        $this -> call([
            TransactionSeeder::class,
        ]);

        $this->call([
            scheduleAssignmentSeeder::class,
        ]);


    }
}
