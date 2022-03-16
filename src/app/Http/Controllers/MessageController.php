<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Exception;

class MessageController extends Controller
{
    public function messages()
    {
        $messages = DB::table('messages')->get();

        return view('pages/messages', compact('messages'));
    }


    public function delete($message_id)
    {
        try {
            DB::table('messages')->where('id', (int) $message_id)->delete();
            return response('success', 200);
        } catch (Exception $ex) {
            info($ex);
            return response('fail', 500);
        }
    }
}
