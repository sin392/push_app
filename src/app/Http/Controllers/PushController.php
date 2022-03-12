<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

const VAPID_SUBJECT = 'http://localhost:8080';
const PUBLIC_KEY = 'BGCBsWD2wckI_Ym0UoHiKEXcV3W_-LPMVzbDA5yjtbuhmm9cYQH16IydrxHtTyFTBGsCylpvL-nakhm0sMHGk-E';
const PRIVATE_KEY = 'EJDBRvAw_Jczn6hbUlVl049D0pHjPXzQxydlDY5pqkI';

class PushController extends Controller
{
    public function index(){
        $subscription = Subscription::create([
            'endpoint' => 'https://fcm.googleapis.com/fcm/send/eVRueQITePE:APA91bFfkn_TZpuh3Ft1LDNqMY4EkIvVuGBs236VTZSPDttd4FlaV1kEhOuFgp487S2GWEYacYwM6mw8_3odKOa7hremNnc33Ra7OWyA_5MFT-KtOSRXxqgR0mD9AdZX4d87dRl9XWdp',
            'userAuthToken' => 'fpoDLHb2MJLaPA1btGQ6Qg==',
            'publicKey' => 'BMkFwQlQMPOZ8pnNUW2o5VGjWMqUOhMG2FhvZ9GFHYhGiOMPEd81r+rFyubeO3X41xuLWa7rzL8LDYErm4MSt60=',
        ]);
    
        // ブラウザに認証させる
        $auth = [
            'VAPID' => [
                'subject' => VAPID_SUBJECT,
                'publicKey' => PUBLIC_KEY,
                'privateKey' => PRIVATE_KEY,
            ]
        ];
    
        $webPush = new WebPush($auth);

        $report = $webPush->sendOneNotification(
            $subscription,
            'push通知の本文だよ！'
        );
        
        $endpoint = $report->getRequest()->getUri()->__toString();
        
        if ($report->isSuccess()) {
            echo '送信成功！';
        } else {
            echo '送信失敗やで';
        }
    }
}
