<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;
use Illuminate\Support\Facades\DB;

class PushController extends Controller
{
    public function subscribe (Request $request) {
        $record = DB::table('subscribers')->where('endpoint', $request->endpoint);
        info($request);
        if ($record->exists()) {
            $item = $record->update(['endpoint' => $request->endpoint, 'token' => $request->token, 'pub_key' => $request->pub_key]);
        } else {
            $item = DB::table('subscribers')->insert(['endpoint' => $request->endpoint, 'token' => $request->token, 'pub_key' => $request->pub_key]);
        }
    }

    public function push(Request $request){
        $subscribers = DB::table('subscribers')->get();

        // ブラウザに認証させる
        $auth = [
            'VAPID' => [
                'subject' => env('MIX_APP_URL'),
                'publicKey' => env('MIX_PUBLIC_KEY'),
                'privateKey' => env('MIX_PRIVATE_KEY'),
            ]
        ];
        $webPush = new WebPush($auth);

        foreach ($subscribers as &$subscriber) {
            $subscription = Subscription::create([
                'endpoint' => $subscriber->endpoint,
                'authToken' => $subscriber->token,
                'publicKey' => $subscriber->pub_key,
            ]);
        
            $webPush->queueNotification(
                $subscription,
                json_encode([
                    'title' => $request->title,
                    'body' => $request->body
                ])
            );
        }

        foreach ($webPush->flush() as $report) {
            $endpoint = $report->getRequest()->getUri()->__toString();
            if ($report->isSuccess()) {
                echo "[v] Message sent successfully for subscription {$endpoint}.";
            } else {
                echo "[x] Message failed to sent for subscription {$endpoint}: {$report->getReason()}";
            }
        }
    }
}
