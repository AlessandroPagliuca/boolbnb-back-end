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
                'name' => 'Private parking',
                'icon' => 'parking',
            ],
            [
                'name' => 'Swimmer',
                'icon' => 'swimmer',
            ],
            [
                'name' => 'ir conditioning',
                'icon' => 'wind',
            ],
            [
                'name' => 'Breakfast included',
                'icon' => 'coffee',
            ],
            [
                'name' => 'Cleaning service',
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
                'icon' => 'stroopwafel ',// table-cells
            ],
            [
                'name' => 'Heating',
                'icon' => 'temperature-high',
            ],
            [
                'name' => 'Patio o balcony',
                'icon' => 'house-chimney-window',
            ],
            [
                'name' => 'Change of sheets and towels everyday',
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
                'icon' => 'instagram fa-rotate-180',
            ],
            [
                'name' => 'Dryer',
                'icon' => 'instagram fa-rotate-180',
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
