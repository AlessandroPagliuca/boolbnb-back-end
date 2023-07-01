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
                'icon' => 'wifi',
            ],
            [
                'name' => 'Parcheggio privato',
                'icon' => 'parking',
            ],
            [
                'name' => 'Piscina',
                'icon' => 'swimmer',
            ],
            [
                'name' => 'Aria condizionata',
                'icon' => 'air-conditioner',
            ],
            [
                'name' => 'Colazione inclusa',
                'icon' => 'coffee',
            ],
            [
                'name' => 'Servizio di pulizia',
                'icon' => 'broom',
            ],
            [
                'name' => 'Palestra',
                'icon' => 'dumbbell',
            ],
            [
                'name' => 'Vista Mare',
                'icon' => 'water',
            ],
            [
                'name' => 'Giardino',
                'icon' => 'flower-tulip',
            ],
            [
                'name' => 'Barbecue',
                'icon' => 'grill-hot',
            ],
            [
                'name' => 'Riscaldamento',
                'icon' => 'temperature-high',
            ],
            [
                'name' => 'Patio o balcone',
                'icon' => 'window-frame-open',
            ],
            [
                'name' => 'Biancheria da letto',
                'icon' => 'blanket',
            ],
            [
                'name' => 'Doccia',
                'icon' => 'shower',
            ],
            [
                'name' => 'Vasca',
                'icon' => 'bath',
            ],
            [
                'name' => 'Lavatrice',
                'icon' => 'washing-machine',
            ],
            [
                'name' => 'Asciugatrice',
                'icon' => 'dryer-heat',
            ],
            [
                'name' => 'TV',
                'icon' => 'tv',
            ],
            [
                'name' => 'Cucina',
                'icon' => 'kitchen-set',
            ],




        ];

        DB::table('services')->insert($services);


    }
}
