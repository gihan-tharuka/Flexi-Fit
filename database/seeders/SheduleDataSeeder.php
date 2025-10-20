<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Models\Workout;
use App\Models\Exercise;

class SheduleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create schedules
        $beginnerSchedule = Schedule::create([
            'name' => 'Beginner 2 Day Plan',
            // 'description' => 'A beginner plan with upper and lower body workouts spread over 2 days.',
        ]);

        $intermediateSchedule = Schedule::create([
            'name' => 'Intermediate 4 Day Split',
            // 'description' => 'A 4-day workout plan targeting different muscle groups.',
        ]);

        // Create workouts for the Beginner 2 Day Plan
        $upperBodyWorkout = Workout::create([
            'name' => 'Day 01 Upper Body',
            'schedule_id' => $beginnerSchedule->id,
        ]);

        $lowerBodyWorkout = Workout::create([
            'name' => 'Day 02 Lower Body',
            'schedule_id' => $beginnerSchedule->id,
        ]);

        // Create workouts for the Intermediate 4 Day Split
        $chestDayWorkout = Workout::create([
            'name' => 'Day 01 Chest and Triceps',
            'schedule_id' => $intermediateSchedule->id,
        ]);

        $backDayWorkout = Workout::create([
            'name' => 'Day 02 Back and Biceps',
            'schedule_id' => $intermediateSchedule->id,
        ]);

        // Add exercises for Upper Body Workout (Beginner)
        Exercise::create([
            'name' => 'Bench Press',
            // 'description' => 'Perform a flat bench press with a barbell.',
            'workout_id' => $upperBodyWorkout->id,
            'sets' => 3,
            'reps' => 12,
            'rest_time' => '90',
        ]);

        Exercise::create([
            'name' => 'Barbell Curl',
            // 'description' => 'Perform a barbell curl for the biceps.',
            'workout_id' => $upperBodyWorkout->id,
            'sets' => 3,
            'reps' => 10,
            'rest_time' => '60',
        ]);

        // Add exercises for Lower Body Workout (Beginner)
        Exercise::create([
            'name' => 'Squat',
            // 'description' => 'Perform a barbell squat.',
            'workout_id' => $lowerBodyWorkout->id,
            'sets' => 4,
            'reps' => 10,
            'rest_time' => '120',
        ]);

        Exercise::create([
            'name' => 'Leg Press',
            // 'description' => 'Perform a leg press on the machine.',
            'workout_id' => $lowerBodyWorkout->id,
            'sets' => 4,
            'reps' => 12,
            'rest_time' => '90',
        ]);

        // Add exercises for Chest and Triceps Workout (Intermediate)
        Exercise::create([
            'name' => 'Incline Bench Press',
            // 'description' => 'Perform an incline bench press with a barbell.',
            'workout_id' => $chestDayWorkout->id,
            'sets' => 4,
            'reps' => 8,
            'rest_time' => '90',
        ]);

        Exercise::create([
            'name' => 'Triceps Dip',
            // 'description' => 'Perform a triceps dip using parallel bars.',
            'workout_id' => $chestDayWorkout->id,
            'sets' => 3,
            'reps' => 12,
            'rest_time' => '60',
        ]);

        // Add exercises for Back and Biceps Workout (Intermediate)
        Exercise::create([
            'name' => 'Pull-up',
            // 'description' => 'Perform a bodyweight pull-up.',
            'workout_id' => $backDayWorkout->id,
            'sets' => 3,
            'reps' => 8,
            'rest_time' => '120',
        ]);

        Exercise::create([
            'name' => 'Deadlift',
            // 'description' => 'Perform a conventional deadlift with a barbell.',
            'workout_id' => $backDayWorkout->id,
            'sets' => 3,
            'reps' => 6,
            'rest_time' => '180',
        ]);
    }
}
