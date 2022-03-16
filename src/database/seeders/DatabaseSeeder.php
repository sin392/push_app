<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\MessageSeeder;
use Database\Seeders\PublisherSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MessageSeeder::class);
        $this->call(PublisherSeeder::class);
    }
}
