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

        for ($i = 0; $i < 200; $i++) {
            $days = rand(1, 30);
            $months = rand(0, 7);

            $viewDate = Carbon::now()->subMonths($months)->subDays($days);

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
