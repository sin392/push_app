<?php

namespace App\Http\Controllers;

class MessageController extends Controller
{
    public function messages (){

        $messages = [
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
        return view('pages/message', compact('messages'));
    }
}