<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function messages (){

        // $messages = [
        //     ['id' => 'id1',
        //     'message' => 'message1'
        //     ], 
        //     ['id' => 'id2',
        //     'message' => 'message2'
        //     ], 
        //     ['id' => 'id3',
        //     'message' => 'message3'
        //     ], 
        // ];

        $messages = DB::table('messages')->get();

        return view('pages/message', compact('messages'));
    }
}