<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Nimal Perera',
                'email' => 'nimal.perera@example.com',
                'password' => Hash::make('password123'),
                'role' => 2,
                'membership_start_date' => now()->subDays(30),
                'membership_end_date' => now()->addDays(60),
                'membership_id' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Sunil Fernando',
                'email' => 'sunil.fernando@example.com',
                'password' => Hash::make('password123'),
                'role' => 2,
                'membership_start_date' => now()->subDays(20),
                'membership_end_date' => now()->addDays(40),
                'membership_id' => 2,
                'status' => 1,
            ],
            [
                'name' => 'Kamala Silva',
                'email' => 'kamala.silva@example.com',
                'password' => Hash::make('password123'),
                'role' => 2,
                'membership_start_date' => now()->subDays(10),
                'membership_end_date' => now()->addDays(20),
                'membership_id' => 3,
                'status' => 1,
            ],
            [
                'name' => 'Sarath Wickramasinghe',
                'email' => 'sarath.wickramasinghe@example.com',
                'password' => Hash::make('password123'),
                'role' => 2,
                'membership_start_date' => now()->subDays(50),
                'membership_end_date' => now()->addDays(10),
                'membership_id' => 4,
                'status' => 0,
            ],
            [
                'name' => 'Ruwan Jayasuriya',
                'email' => 'ruwan.jayasuriya@example.com',
                'password' => Hash::make('password123'),
                'role' => 2,
                'membership_start_date' => now()->subDays(5),
                'membership_end_date' => now()->addDays(25),
                'membership_id' => 2,
                'status' => 0,
            ],
            [
                'name' => 'Priyanka Ranasinghe',
                'email' => 'priyanka.ranasinghe@example.com',
                'password' => Hash::make('password123'),
                'role' => 2,
                'membership_start_date' => now()->subDays(15),
                'membership_end_date' => now()->addDays(15),
                'membership_id' => 1,
                'status' => 0,
            ],
            [
                'name' => 'Chathura Gunawardena',
                'email' => 'chathura.gunawardena@example.com',
                'password' => Hash::make('password123'),
                'role' => 2,
                'membership_start_date' => now()->subDays(40),
                'membership_end_date' => now()->addDays(30),
                'membership_id' => 3,
                'status' => 1,
            ],
            [
                'name' => 'Anusha Wijesinghe',
                'email' => 'anusha.wijesinghe@example.com',
                'password' => Hash::make('password123'),
                'role' => 2,
                'membership_start_date' => now()->subDays(10),
                'membership_end_date' => now()->addDays(60),
                'membership_id' => 4,
                'status' => 1,
            ],
            [
                'name' => 'Dinesh Bandara',
                'email' => 'dinesh.bandara@example.com',
                'password' => Hash::make('password123'),
                'role' => 2,
                'membership_start_date' => now()->subDays(25),
                'membership_end_date' => now()->addDays(35),
                'membership_id' => 2,
                'status' => 1,
            ],
            [
                'name' => 'Madhavi Amarasinghe',
                'email' => 'madhavi.amarasinghe@example.com',
                'password' => Hash::make('password123'),
                'role' => 2,
                'membership_start_date' => now()->subDays(60),
                'membership_end_date' => now()->addDays(90),
                'membership_id' => 3,
                'status' => 1,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
