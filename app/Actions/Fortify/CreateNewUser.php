<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            // Optional membership-related fields: validate if present
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'membership_plan' => ['nullable'],
            // 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            // Use null coalescing to avoid undefined array key errors when fields are not provided
            'membership_start_date' => $input['start_date'] ?? null,
            'membership_end_date' => $input['end_date'] ?? null,
            'membership_id' => $input['membership_plan'] ?? null,
        ]);
    }
}
