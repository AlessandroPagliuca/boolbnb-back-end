<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            User::class,
            Apartment::class,
            Message::class,
            View::class,
            Image::class,
            Service::class,
            Sponsorship::class,
        ]);
    }
}
