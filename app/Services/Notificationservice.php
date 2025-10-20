<?php

// app/Services/NotificationService.php

namespace App\Services;


use Minishlink\WebPush\Subscription;
use Minishlink\WebPush\WebPush;
use App\Models\PushNotification;

class Notificationservice
{
    public function sendNotification($title, $body, $icon, $url)
    {
        // Define VAPID authentication credentials
        $auth = [
            'VAPID' => [
                'subject' => 'http://127.0.0.1:8000/',
                'publicKey' => 'BFT0mbmT0C7jz1wieAxMEN19NUVJPNaZrbEj20qm2VF7hlOHhIzQqAuMBfFIrkCRNpUd8lNO3_smXhI9cpxuzBk',
                'privateKey' => 'bTTs2WSJ823qZYpumH4fJzWgkcN9fy8EfBVSdwoBZT0',
            ],
        ];

        // Initialize the WebPush instance with the authentication data
        $webPush = new WebPush($auth);

        // Prepare the payload data for the notification
        $payload = json_encode([
            'title' => $title,
            'body' => $body,
            'icon' => $icon,
            'url' => $url,
        ]);


        $adminSubscriptions = PushNotification::all();


        // Send notifications to each admin subscription
        foreach ($adminSubscriptions as $notification) {
            $webPush->sendOneNotification(
                Subscription::create($notification->subscriptions),
                $payload,
                ['TTL' => 5000]
            );
        }

        // Flush notifications and handle any errors
        foreach ($webPush->flush() as $report) {
            if ($report->isSuccess()) {
                echo "Notification sent successfully to endpoint: {$report->getRequest()->getUri()}";
            } else {
                echo "Notification failed for endpoint: {$report->getRequest()->getUri()}, reason: {$report->getReason()}";
            }
        }
    }
}

