<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index () 
    {
        $message_array = [
            ['id' => 'id1',
             'message' => 'message1'
            ], 
            ['id' => 'id2',
             'message' => 'message2'
            ], 
            ['id' => 'id3',
            'message' => 'message3'
            ], 
        ];
        
        // $message_array = array_column($message_array, 'id','message');
        // return view('test', compact('hello', 'hello_array'));
        return view('pages/test', compact('message_array'));
    }
}
