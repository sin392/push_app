<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function subscribers () {
        $subscribers = DB::table('subscribers')->get();

        return view('pages/subscribers', compact('subscribers'));
    }
}
