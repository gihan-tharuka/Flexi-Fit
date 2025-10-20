<?php

namespace Database\Seeders;

use App\Models\ScheduleAssignment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class scheduleAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['user_id' => 1, 'schedule_id' => 1, 'status' => 1],
            ['user_id' => 2, 'schedule_id' => 2, 'status' => 0],
            ['user_id' => 3, 'schedule_id' => 3, 'status' => 1],
            ['user_id' => 4, 'schedule_id' => 1, 'status' => 1],
            ['user_id' => 5, 'schedule_id' => 3, 'status' => 0],
        ];

        foreach ($data as $item) {
            scheduleAssignment::create($item);
        }
    }
}
