<?php

// app/Console/Commands/MembershipExpire.php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use App\Models\User;
use Filament\Notifications\Notification;
use NotifyLk\Api\SmsApi;

// Import the Notification class

class MembershipExpire extends Command
{
    protected $signature = 'membership:expire';
    protected $description = 'Check for expired memberships and notify users';

    public function handle()
    {
        $currentDate = now();
        $users = User::where('membership_end_date', '<=', $currentDate)->get();

        foreach ($users as $user) {


                $user->update(['status' => 0]);
                // Send notification to the Filament dashboard
                $user->notify(
                    Notification::make()
                        ->title('Your membership has expired')
                        ->body('Please renew your membership to continue enjoying our services.')
                        ->toDatabase()
                );

            // SMS notification


            $api_instance = new SmsApi();
            $user_id = "28419"; // Replace with your actual user ID
            $api_key = "VShXDwJNmYzmVCMiGBGL"; // Replace with your actual API key
            $message = "Please renew your membership to continue enjoying our services.";
            $to = "94{$user->phone}"; // Replace with the user's phone number

            try {
                $result = $api_instance->sendSMS($user_id, $api_key, $message, $to, "NotifyDEMO");
                if ($result) {
                    // Log success message
                    \Log::info("SMS sent successfully: " . print_r($result, true));
                    echo "<script>console.log('SMS sent successfully');</script>";
                }
            } catch (Exception $e) {
                // Log error message
                \Log::error('Error sending SMS: ' . $e->getMessage());
                echo "<script>console.log('Error sending SMS: " . $e->getMessage() . "');</script>";

                // Optionally, log or print a message
                $this->info("Notification sent to: {$user->email}");
            }
        }
    }
}
