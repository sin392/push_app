<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Exception;

class SubscriberController extends Controller
{
    public function subscribers()
    {
        $subscribers = DB::table('subscribers')->get();

        return view('pages/subscribers', ['items' => $subscribers]);
    }
}
