<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Exception;

class PublisherController extends Controller
{
    public function publishers()
    {
        // $publishers = DB::table('publishers')->get();
        $publishers = [];

        return view('pages/publishers', ['items' => $publishers]);
    }
}
