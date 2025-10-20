<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\Schedule;
use App\Models\Workout;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TwoDayBeginnerScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Create the schedule
        $schedule = Schedule::create([
            'name' => 'Two Day Beginner Schedule',
        ]);

        // Create Day 1 workout (e.g., Upper Body)
        $workoutDay1 = Workout::create([
            'name' => 'Day 1: Upper Body',
            'schedule_id' => $schedule->id,
        ]);

        // Add exercises for Day 1 workout
        $exercisesDay1 = [
            ['name' => 'Push-up', 'sets' => 3, 'reps' => 10, 'rest_time' => 60],
            ['name' => 'Pull-up', 'sets' => 3, 'reps' => 8, 'rest_time' => 90],
            ['name' => 'Dumbbell Shoulder Press', 'sets' => 3, 'reps' => 12, 'rest_time' => 60],
        ];

        foreach ($exercisesDay1 as $exercise) {
            Exercise::create(array_merge($exercise, ['workout_id' => $workoutDay1->id]));
        }

        // Create Day 2 workout (e.g., Lower Body)
        $workoutDay2 = Workout::create([
            'name' => 'Day 2: Lower Body',
            'schedule_id' => $schedule->id,
        ]);

        // Add exercises for Day 2 workout
        $exercisesDay2 = [
            ['name' => 'Squat', 'sets' => 4, 'reps' => 10, 'rest_time' => 60],
            ['name' => 'Lunges', 'sets' => 3, 'reps' => 12, 'rest_time' => 60],
            ['name' => 'Leg Press', 'sets' => 3, 'reps' => 15, 'rest_time' => 90],
        ];

        foreach ($exercisesDay2 as $exercise) {
            Exercise::create(array_merge($exercise, ['workout_id' => $workoutDay2->id]));
        }
    }

}
