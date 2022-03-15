<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index () 
    {
        // $hello = 'Hello,World!';
        // $hello_array = array();

        $message_array = [
            ['id1' => 'message1'], 
            ['id2' => 'message2'], 
            ['id3' => 'message3'],
        ];

        // return view('test', compact('hello', 'hello_array'));
        return view('test', ['message_array' => $message_array]);
    }
}