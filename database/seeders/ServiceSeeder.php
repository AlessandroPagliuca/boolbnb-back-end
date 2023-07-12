<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name' => 'Wi-Fi',
                'icon' => 'wifi',
            ],
            [
                'name' => 'Parking',
                'icon' => 'parking',
            ],
            [
                'name' => 'Swimmer',
                'icon' => 'swimmer',
            ],
            [
                'name' => 'Air conditioning',
                'icon' => 'snowflake',
            ],
            [
                'name' => 'Breakfast',
                'icon' => 'coffee',
            ],
            [
                'name' => 'Cleaning',
                'icon' => 'broom',
            ],
            [
                'name' => 'Gym',
                'icon' => 'dumbbell',
            ],
            [
                'name' => 'Sea view',
                'icon' => 'water',
            ],
            [
                'name' => 'Garden',
                'icon' => 'leaf',
            ],
            [
                'name' => 'Barbecue',
                'icon' => 'stroopwafel ',
            ],
            [
                'name' => 'Heating',
                'icon' => 'temperature-high',
            ],
            [
                'name' => 'Patio',
                'icon' => 'house-chimney-window',
            ],
            [
                'name' => 'Towels',
                'icon' => 'rug',
            ],
            [
                'name' => 'Shower',
                'icon' => 'shower',
            ],
            [
                'name' => 'Tub',
                'icon' => 'bath',
            ],
            [
                'name' => 'Washing machine',
                'icon' => 'soap',
            ],
            [
                'name' => 'Dryer',
                'icon' => 'wind',
            ],
            [
                'name' => 'TV',
                'icon' => 'tv',
            ],
            [
                'name' => 'Kitchen',
                'icon' => 'kitchen-set',
            ],




        ];

        DB::table('services')->insert($services);


    }
}
