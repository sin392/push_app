<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscribeController extends Controller
{
    function index (Request $request) {
        $item = Subscriber::create(['endpoint' => 'endpoint', 'token' => 'token', 'pub_key' => 'pub_key']);
    }
}
