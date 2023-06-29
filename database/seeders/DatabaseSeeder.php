<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Mail\Events\MessageSent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ApartmentSeeder::class,
            MessageSeeder::class,
            ViewSeeder::class,
            ImageSeeder::class,
            ServiceSeeder::class,
            SponsorshipSeeder::class,
        ]);
    }
}
