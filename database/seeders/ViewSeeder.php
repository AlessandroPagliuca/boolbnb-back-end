<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\View;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ViewSeeder extends Seeder
{
    public function run()
    {
        $viewsData = [];

        $apartmentIds = DB::table('apartments')->pluck('id')->toArray();

        $startDate = Carbon::createFromDate(Carbon::now()->subYear(), 8, 1);
        $endDate = Carbon::now();

        $numberOfDays = $endDate->diffInDays($startDate);

        for ($i = 0; $i < 200; $i++) {
            $randomDays = rand(0, $numberOfDays);

            $viewDate = $startDate->copy()->addDays($randomDays);

            $viewData = [
                'apartment_id' => $apartmentIds[array_rand($apartmentIds)],
                'view_date' => $viewDate,
                'address_ip' => '192.168.0.' . rand(1, 255),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $viewsData[] = $viewData;
        }

        DB::table('views')->insert($viewsData);
    }
}
