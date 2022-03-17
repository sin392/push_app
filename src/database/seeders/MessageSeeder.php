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
        DB::table('messages')->insert([[
            'publisher_id' => 'not implemented',
            'title' => 'title-1',
            'body' => 'body-1',
            'created_at' => date("Y-m-d H:i:s"),
            'scheduled_at' => date("Y-m-d H:i:s"),
            'is_sended' => true,
        ], [
            'publisher_id' => 'not implemented',
            'title' => 'title-2',
            'body' => 'body-2',
            'created_at' => date("Y-m-d H:i:s"),
            'scheduled_at' => date("Y-m-d H:i:s"),
            'is_sended' => true,
        ], [
            'publisher_id' => 'not implemented',
            'title' => 'title-3',
            'body' => 'body-3',
            'created_at' => date("Y-m-d H:i:s"),
            'scheduled_at' => date("Y-m-d H:i:s"),
            'is_sended' => true,
        ]]);
    }
}
