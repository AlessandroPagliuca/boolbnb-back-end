<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Sponsorship;

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
                'description' => 'The basic subscription with a duration of 24 hours for only € 2.99 and the possibility to highlight the ad offers users an opportunity to promote their ads effectively and quickly. This subscription allows you to get more exposure for your ad, increasing your chances of attracting potential buyers or renters.',
            ],
            [
                'name' => 'Medium',
                'price' => 5.99,
                'duration' => 72,
                'description' => 'The medium subscription with a duration of no more than 24 hours, but 72 hours for only €5.99 and the possibility of highlighting the ad offers users an opportunity to promote their ads effectively and quickly. This subscription allows you to get more exposure for your ad, increasing your chances of attracting potential buyers or renters.',
            ],
            [
                'name' => 'Premium',
                'price' => 9.99,
                'duration' => 144,
                'description' => 'The premium subscription with a duration of no more than 24h or 72h but 144 hours for only €9.99 and the possibility of highlighting the ad offers users an opportunity to promote their ads effectively and quickly. This subscription allows you to get more exposure for your ad, increasing your chances of attracting potential buyers or renters.',
            ],

        ];

        DB::table('sponsorships')->insert($sponsorships);
    }
}
