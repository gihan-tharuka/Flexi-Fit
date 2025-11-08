<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\MembershipPlan;
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
            'membership_plan' => ['required', 'exists:membership_plans,id'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            // 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Fetch the membership plan to get its duration
        $membershipPlan = MembershipPlan::find($input['membership_plan']);

        // Calculate end_date based on start_date and plan duration
        $startDate = \Carbon\Carbon::parse($input['start_date']);
        $calculatedEndDate = $startDate->addDays($membershipPlan->duration)->format('Y-m-d');

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'membership_start_date' => $input['start_date'],
            'membership_end_date' => $calculatedEndDate, // Use the calculated end date
            'membership_id' => $input['membership_plan'],
        ]);
    }
}
