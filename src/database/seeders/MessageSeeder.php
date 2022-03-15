<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'publisher_id' => '',
            'title' => 'title',
            'body' => 'body',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }
}