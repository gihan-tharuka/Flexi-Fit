<?php

namespace App\Console\Commands;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdminUser extends Command
{
    protected $signature = 'admin:create {--email=} {--password=} {--name=}';

    protected $description = 'Create a new admin user for Filament panel';

    public function handle()
    {
        $this->info('Creating admin user for Flexi-Fit Dashboard...');
        $this->newLine();

        $email = $this->option('email') ?? $this->ask('Email address');
        $name = $this->option('name') ?? $this->ask('Name', 'Admin');
        $password = $this->option('password') ?? $this->secret('Password (min 8 characters)');

        $validator = Validator::make([
            'email' => $email,
            'name' => $name,
            'password' => $password,
        ], [
            'email' => ['required', 'email', 'unique:users,email'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return Command::FAILURE;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => Role::admin,
            'status' => 1,
        ]);

        $this->newLine();
        $this->info('Admin user created successfully!');
        $this->newLine();
        $this->table(
            ['Field', 'Value'],
            [
                ['Name', $user->name],
                ['Email', $user->email],
                ['Role', 'Admin'],
                ['ID', $user->id],
            ]
        );
        $this->newLine();
        $this->info('You can now login at: ' . url('/admin/login'));

        return Command::SUCCESS;
    }
}
