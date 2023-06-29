<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Apartment;
use App\Models\Image;
use Faker\Generator as Faker;


class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 120; $i++) {
            $image = new Image;
            $apartment = Apartment::inRandomOrder()->first();
            $image->apartment_id = $apartment->id;
            $image->img = 'https://picsum.photos/200/300';
            $image->save();
        }

    }
}