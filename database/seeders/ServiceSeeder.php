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
                'icon' => '<i class="fa-light fa-air-conditioner"></i>',
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
                'name' => 'Vista Mare',
                'icon' => '<i class="fa-solid fa-water"></i>',
            ],
            [
                'name' => 'Giardino',
                'icon' => '<i class="fa-solid fa-flower-tulip"></i>',
            ],
            [
                'name' => 'Barbecue',
                'icon' => '<i class="fa-solid fa-grill-hot"></i>',
            ],
            [
                'name' => 'Riscaldamento',
                'icon' => '<i class="fa-solid fa-temperature-high"></i>',
            ],
            [
                'name' => 'Patio o balcone',
                'icon' => '<i class="fa-solid fa-window-frame-open"></i>',
            ],
            [
                'name' => 'Biancheria da letto',
                'icon' => '<i class="fa-solid fa-blanket"></i>',
            ],
            [
                'name' => 'Doccia',
                'icon' => '<i class="fa-solid fa-shower"></i>',
            ],
            [
                'name' => 'Vasca',
                'icon' => '<i class="fa-solid fa-bath"></i>',
            ],
            [
                'name' => 'Lavatrice',
                'icon' => '<i class="fa-solid fa-washing-machine"></i>',
            ],
            [
                'name' => 'Asciugatrice',
                'icon' => '<i class="fa-solid fa-dryer-heat"></i>',
            ],
            [
                'name' => 'TV',
                'icon' => '<i class="fa-solid fa-tv"></i>',
            ],
            [
                'name' => 'Cucina',
                'icon' => '<i class="fa-solid fa-kitchen-set"></i>',
            ],




        ];

        DB::table('services')->insert($services);


    }
}
