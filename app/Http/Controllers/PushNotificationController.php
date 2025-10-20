<?php

namespace App\Http\Controllers;

use App\Models\PushNotification;
use Illuminate\Http\Request;
use Minishlink\WebPush\WebPush;

class PushNotificationController extends Controller
{
    public function saveSubscription(Request $request){
        $items = new PushNotification();
        $items->subscriptions = json_decode($request->sub);
        $items->save();

        return response()->json(['success' => 'added successfully'], 200);
    }

    public function sendNotification(Request $request){
        $auth = [
            'VAPID' => [
                'subject' => 'http://127.0.0.1:8000/', // can be a mailto: or your website address
                'publicKey' => 'BFT0mbmT0C7jz1wieAxMEN19NUVJPNaZrbEj20qm2VF7hlOHhIzQqAuMBfFIrkCRNpUd8lNO3_smXhI9cpxuzBk', // (recommended) uncompressed public key P-256 encoded in Base64-URL
                'privateKey' => 'bTTs2WSJ823qZYpumH4fJzWgkcN9fy8EfBVSdwoBZT0', // (recommended) in fact the secret multiplier of the private key encoded in Base64-URL

            ],
        ];

        $webPush = new WebPush($auth);

        $payload=json_encode(
            [
                'title' => $request->title,
                'body' => $request->body,
                'icon' => $request->icon,
                'url' => $request->url
            ]
        );

        $userSubscription = PushNotification::where('user_id', $request->user_id)->first();

        if ($userSubscription) {
            $payload = json_encode([
                'title' => $request->title,
                'body' => $request->body,
                'icon' => $request->icon,
                'url' => $request->url
            ]);
        }

        // Retrieve admin subscriptions only
        $adminSubscriptions = PushNotification::where('role', 1)->first();

        // Send notifications to each admin subscription
        foreach ($adminSubscriptions as $subscription) {
            $webPush->sendOneNotification(
                $subscription->endpoint,
                $payload,
                $subscription->public_key,
                $subscription->auth_token
            );
        }

        // Flush notifications and check for errors
        foreach ($webPush->flush() as $report) {
            if ($report->isSuccess()) {
                echo "Notification sent successfully to endpoint: {$report->getRequest()->getUri()}";
            } else {
                echo "Notification failed for endpoint: {$report->getRequest()->getUri()}, reason: {$report->getReason()}";
            }
        }

    }
}
