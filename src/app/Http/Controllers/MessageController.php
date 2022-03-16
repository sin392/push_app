<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function messages()
    {
        $messages = DB::table('messages')->get();

        return view('pages/message', compact('messages'));
    }
}
