<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'name' => 'Wi-Fi gratuito',
                'icon' => '<i class="fa-solid fa-wifi"></i>',
            ],
            [
                'name' => 'Parcheggio privato',
                'icon' => '<i class="fa-solid fa-parking"></i>',
            ],
            [
                'name' => 'Piscina',
                'icon' => '<i class="fa-solid fa-swimmer"></i>',
            ],
            [
                'name' => 'Aria condizionata',
                'icon' => '<i class="fa-solid fa-wind"></i>',
            ],
            [
                'name' => 'Colazione inclusa',
                'icon' => '<i class="fa-solid fa-coffee"></i>',
            ],
            [
                'name' => 'Servizio di pulizia',
                'icon' => '<i class="fa-solid fa-broom"></i>',
            ],
            [
                'name' => 'Palestra',
                'icon' => '<i class="fa-solid fa-dumbbell"></i>',
            ],
            [
                'name' => 'Sea View',
                'icon' => '<i class="fas fa-water"></i>',
            ],
        ];

        DB::table('services')->insert($services);


    }
}