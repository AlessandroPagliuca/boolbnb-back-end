<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Apartment;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = [
            [
                'title' => 'Appartamento accogliente',
                'slug' => 'appartamento-accogliente',
                'description' => 'Questo appartamento offre un ambiente accogliente e confortevole.',
                'rooms' => 2,
                'beds' => 3,
                'bathrooms' => 1,
                'square_meters' => 80,
                'address' => 'Via Roma 123',
                'latitude' => 41.123456,
                'longitude' => 12.345678,
                'visible' => true,
                'price' => 120.50,
                'user_id' => 1,
            ],
            [
                'title' => 'Appartamento moderno',
                'slug' => 'appartamento-moderno',
                'description' => 'Questo appartamento dal design moderno offre una vista mozzafiato sulla città.',
                'rooms' => 3,
                'beds' => 4,
                'bathrooms' => 2,
                'square_meters' => 120,
                'address' => 'Via Verdi 456',
                'latitude' => 41.987654,
                'longitude' => 12.765432,
                'visible' => true,
                'price' => 180.00,
                'user_id' => 1,
            ],
            [
                'title' => 'Appartamento con terrazza',
                'slug' => 'appartamento-con-terrazza',
                'description' => 'Questo appartamento dispone di una spaziosa terrazza con vista panoramica.',
                'rooms' => 2,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => 90,
                'address' => 'Via Dante 789',
                'latitude' => 41.654321,
                'longitude' => 12.987654,
                'visible' => true,
                'price' => 150.50,
                'user_id' => 2,
            ],
            [
                'title' => 'Appartamento elegante',
                'slug' => 'appartamento-elegante',
                'description' => 'Questo appartamento elegantemente arredato offre una vista mozzafiato sul mare.',
                'rooms' => 4,
                'beds' => 6,
                'bathrooms' => 3,
                'square_meters' => 150,
                'address' => 'Via Mazzini 10',
                'latitude' => 42.123456,
                'longitude' => 13.987654,
                'visible' => true,
                'price' => 250.00,
                'user_id' => 3,
            ],
            [
                'title' => 'Appartamento rustico',
                'slug' => 'appartamento-rustico',
                'description' => 'Questo appartamento dallo stile rustico è immerso nella natura e offre tranquillità e relax.',
                'rooms' => 2,
                'beds' => 3,
                'bathrooms' => 1,
                'square_meters' => 100,
                'address' => 'Via Provinciale 20',
                'latitude' => 42.987654,
                'longitude' => 13.123456,
                'visible' => true,
                'price' => 120.50,
                'user_id' => 4,
            ],
            [
                'title' => 'Appartamento panoramico',
                'slug' => 'appartamento-panoramico',
                'description' => 'Questo appartamento offre una vista panoramica spettacolare sulla città e sulle montagne circostanti.',
                'rooms' => 3,
                'beds' => 4,
                'bathrooms' => 2,
                'square_meters' => 110,
                'address' => 'Via Garibaldi 15',
                'latitude' => 43.123456,
                'longitude' => 14.987654,
                'visible' => true,
                'price' => 180.00,
                'user_id' => 5,
            ],
            [
                'title' => 'Appartamento di lusso',
                'slug' => 'appartamento-di-lusso',
                'description' => 'Questo appartamento di lusso offre comfort e eleganza in un ambiente esclusivo.',
                'rooms' => 5,
                'beds' => 8,
                'bathrooms' => 4,
                'square_meters' => 200,
                'address' => 'Via Cavour 25',
                'latitude' => 43.987654,
                'longitude' => 14.123456,
                'visible' => true,
                'price' => 350.00,
                'user_id' => 6,
            ],
            [
                'title' => 'Appartamento in centro storico',
                'slug' => 'appartamento-centro-storico',
                'description' => 'Questo appartamento si trova nel cuore del centro storico, circondato da siti storici e culturali.',
                'rooms' => 1,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => 60,
                'address' => 'Via dei Musei 5',
                'latitude' => 43.456789,
                'longitude' => 14.567890,
                'visible' => true,
                'price' => 90.00,
                'user_id' => 7,
            ],
            [
                'title' => 'Appartamento con giardino',
                'slug' => 'appartamento-giardino',
                'description' => 'Questo appartamento dispone di un ampio giardino privato, ideale per rilassarsi e godere della natura.',
                'rooms' => 4,
                'beds' => 6,
                'bathrooms' => 2,
                'square_meters' => 150,
                'address' => 'Via Verde 30',
                'latitude' => 43.678901,
                'longitude' => 14.678901,
                'visible' => true,
                'price' => 200.00,
                'user_id' => 8,
            ],
            [
                'title' => 'Appartamento vicino al mare',
                'slug' => 'appartamento-vicino-mare',
                'description' => 'Questo appartamento si trova a pochi passi dalla spiaggia, ideale per gli amanti del mare e delle attività acquatiche.',
                'rooms' => 2,
                'beds' => 3,
                'bathrooms' => 1,
                'square_meters' => 80,
                'address' => 'Via del Mare 10',
                'latitude' => 43.890123,
                'longitude' => 14.789012,
                'visible' => true,
                'price' => 120.50,
                'user_id' => 9,
            ],
        ];

        DB::table('apartments')->insert($apartments);
    }
}
