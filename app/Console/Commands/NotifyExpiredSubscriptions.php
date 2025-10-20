<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NotifyExpiredSubscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notify-expired-subscriptions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredSubscriptions = Subscription::where('end_date', '<', now())
            ->where('active', true)
            ->with('user')
            ->get();

        foreach ($expiredSubscriptions as $subscription) {
            // Send notification (using Laravel's Notification system)
            // You can create a notification class and use it here
            Notification::send($subscription->user, new MembershipExpiredNotification());

            // Update subscription status
            $subscription->update(['active' => false]);
        }
    }
}
