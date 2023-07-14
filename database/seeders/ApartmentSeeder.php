<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Apartment;
use App\Models\Service;
use App\Models\Sponsorship;
use Carbon\Carbon;


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
                'main_img' => 'https://cdn.pixabay.com/photo/2016/11/29/03/53/house-1867187_640.jpg',
                'rooms' => 2,
                'beds' => 3,
                'bathrooms' => 1,
                'square_meters' => 80,
                'address' => 'Via Roma 123',
                'city' => 'Roma',
                'country' => 'Italia',
                'zipcode' => '00100',
                'latitude' => 41.9027835,
                'longitude' => 12.4963655,
                'visible' => true,
                'price' => 120.50,
                'user_id' => 1,
            ],
            [
                'title' => 'Appartamento moderno',
                'slug' => 'appartamento-moderno',
                'description' => 'Questo appartamento dal design moderno offre una vista mozzafiato sulla città.',
                'main_img' => 'https://housing.com/news/wp-content/uploads/2022/11/shutterstock_1715891752-1200x700-compressed.jpg',
                'rooms' => 3,
                'beds' => 4,
                'bathrooms' => 2,
                'square_meters' => 120,
                'address' => 'Via Verdi 456',
                'city' => 'Milano',
                'country' => 'Italia',
                'zipcode' => '20100',
                'latitude' => 45.4642,
                'longitude' => 9.1900,
                'visible' => true,
                'price' => 180.00,
                'user_id' => 1,
            ],
            [
                'title' => 'Appartamento con terrazza',
                'slug' => 'appartamento-con-terrazza',
                'description' => 'Questo appartamento dispone di una spaziosa terrazza con vista panoramica.',
                'main_img' => 'https://www.backend.myjoyonline.com/wp-content/uploads/2023/05/w620x413.png',
                'rooms' => 2,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => 90,
                'address' => 'Via Dante 789',
                'city' => 'Napoli',
                'country' => 'Italia',
                'zipcode' => '80100',
                'latitude' => 40.8522,
                'longitude' => 14.2681,
                'visible' => true,
                'price' => 150.50,
                'user_id' => 2,
            ],
            [
                'title' => 'Appartamento elegante',
                'slug' => 'appartamento-elegante',
                'description' => 'Questo appartamento elegantemente arredato offre una vista mozzafiato sul mare.',
                'main_img' => 'https://hips.hearstapps.com/hmg-prod/images/img-6042-649c932798141.jpeg', //da modificare
                'rooms' => 4,
                'beds' => 6,
                'bathrooms' => 3,
                'square_meters' => 150,
                'address' => 'Via Mazzini 10',
                'city' => 'Firenze',
                'country' => 'Italia',
                'zipcode' => '50100',
                'latitude' => 43.7696,
                'longitude' => 11.2558,
                'visible' => true,
                'price' => 250.00,
                'user_id' => 3,
            ],
            [
                'title' => 'Appartamento rustico',
                'slug' => 'appartamento-rustico',
                'description' => 'Questo appartamento dallo stile rustico è immerso nella natura e offre tranquillità e relax.',
                'main_img' => 'https://thumbor.forbes.com/thumbor/fit-in/x/https://www.forbes.com/advisor/wp-content/uploads/2021/08/download-7.jpg',
                'rooms' => 2,
                'beds' => 3,
                'bathrooms' => 1,
                'square_meters' => 100,
                'address' => 'Via Provinciale 20',
                'city' => 'Bologna',
                'country' => 'Italia',
                'zipcode' => '40100',
                'latitude' => 44.4949,
                'longitude' => 11.3426,
                'visible' => true,
                'price' => 120.50,
                'user_id' => 4,
            ],
            [
                'title' => 'Appartamento panoramico',
                'slug' => 'appartamento-panoramico',
                'description' => 'Questo appartamento offre una vista panoramica spettacolare sulla città e sulle montagne circostanti.',
                'main_img' => 'https://cdn.houseplansservices.com/product/pk8ecmlmjnbibk8r5fr01oje77/w620x413.jpg',
                'rooms' => 3,
                'beds' => 4,
                'bathrooms' => 2,
                'square_meters' => 110,
                'address' => 'Via Garibaldi 15',
                'city' => 'Torino',
                'country' => 'Italia',
                'zipcode' => '10100',
                'latitude' => 45.0703,
                'longitude' => 7.6869,
                'visible' => true,
                'price' => 180.00,
                'user_id' => 5,
            ],
            [
                'title' => 'Appartamento di lusso',
                'slug' => 'appartamento-di-lusso',
                'description' => 'Questo appartamento di lusso offre comfort e eleganza in un ambiente esclusivo.',
                'main_img' => 'https://img.staticmb.com/mbcontent/images/uploads/2023/1/Vastu_directions_for_house.jpg',
                'rooms' => 5,
                'beds' => 8,
                'bathrooms' => 4,
                'square_meters' => 200,
                'address' => 'Via Cavour 25',
                'city' => 'Venezia',
                'country' => 'Italia',
                'zipcode' => '30100',
                'latitude' => 45.4344,
                'longitude' => 12.3388,
                'visible' => true,
                'price' => 300.00,
                'user_id' => 6,
            ],
            [
                'title' => 'Appartamento in centro',
                'slug' => 'appartamento-in-centro',
                'description' => 'Questo appartamento si trova nel cuore della città ed è circondato da negozi, ristoranti e attrazioni.',
                'main_img' => 'https://cdn.houseplansservices.com/product/p3s4kctq2eesmn073030o18i1o/w620x413.jpg',
                'rooms' => 1,
                'beds' => 2,
                'bathrooms' => 1,
                'square_meters' => 60,
                'address' => 'Via XX Settembre 35',
                'city' => 'Genova',
                'country' => 'Italia',
                'zipcode' => '16100',
                'latitude' => 44.4076,
                'longitude' => 8.9339,
                'visible' => true,
                'price' => 100.00,
                'user_id' => 7,
            ],
            [
                'title' => 'Appartamento tranquillo',
                'slug' => 'appartamento-tranquillo',
                'description' => 'Questo appartamento si trova in una zona tranquilla e offre un ambiente sereno e rilassante.',
                'main_img' => 'https://images.familyhomeplans.com/cdn-cgi/image/fit=scale-down,quality=85/plans/80864/80864-b580.jpg',
                'rooms' => 3,
                'beds' => 4,
                'bathrooms' => 2,
                'square_meters' => 100,
                'address' => 'Via Provinciale 40',
                'city' => 'Verona',
                'country' => 'Italia',
                'zipcode' => '37100',
                'latitude' => 45.4384,
                'longitude' => 10.9916,
                'visible' => true,
                'price' => 120.50,
                'user_id' => 8,
            ],

        ];


        $services = Service::whereIn('id', range(1, 19))->inRandomOrder()->get();
        $sponsorships = Sponsorship::inRandomOrder()->get();

        foreach ($apartments as $apartment) {
            $apartmentModel = Apartment::create($apartment);

            $randomServices = $services->random(10);
            $apartmentModel->services()->sync($randomServices->pluck('id'));

            $randomSponsorship = $sponsorships->random();
            $durationHours = $randomSponsorship->duration;

            $startDate = Carbon::now();
            $endDate = $startDate->copy()->addHours($durationHours);

            $apartmentModel->sponsorships()->attach($randomSponsorship->id, [
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);
        }
    }
}
