<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsorships = [
            [
                'name' => 'Base',
                'price' => 2.99,
                'duration' => 24,
                'description' => 'L\'abbonamento base con una durata di 24 ore a soli 2.99€ e la possibilità di mettere l\'annuncio in evidenza offre agli utenti un\'opportunità di promuovere i propri annunci in modo efficace e rapido. Questo abbonamento consente di ottenere maggiore visibilità per l\'annuncio, aumentando le possibilità di attirare potenziali acquirenti o affittuari.',
            ],
            [
                'name' => 'Medium',
                'price' => 5.99,
                'duration' => 72,
                'description' => 'L\'abbonamento medium con una durata non più di 24h, ma 72 ore a soli 5.99€ e la possibilità di mettere l\'annuncio in evidenza offre agli utenti un\'opportunità di promuovere i propri annunci in modo efficace e rapido. Questo abbonamento consente di ottenere maggiore visibilità per l\'annuncio, aumentando le possibilità di attirare potenziali acquirenti o affittuari.',
            ],
            [
                'name' => 'Premium',
                'price' => 9.99,
                'duration' => 144,
                'description' => 'L\'abbonamento premium con una durata non più di 24h o 72h ma 144 ore a soli 9.99€ e la possibilità di mettere l\'annuncio in evidenza offre agli utenti un\'opportunità di promuovere i propri annunci in modo efficace e rapido. Questo abbonamento consente di ottenere maggiore visibilità per l\'annuncio, aumentando le possibilità di attirare potenziali acquirenti o affittuari.',
            ],

        ];

        DB::table('sponsorships')->insert($sponsorships);

    }
}