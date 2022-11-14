<?php

namespace Database\Seeders;

use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insertArray = [
            [
                'country_id' => 1,
                'name'       => "NSW | New South Wales",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country_id' => 1,
                'name'       => "QLD | Queensland",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country_id' => 1,
                'name'       => "SA | South Australia",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country_id' => 1,
                'name'       => "TAS | Tasmania",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country_id' => 1,
                'name'       => "VIC | Victoria",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country_id' => 1,
                'name'       => "WA | Western Australia",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country_id' => 1,
                'name'       => "ACT | Australian Capital Territory",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'country_id' => 1,
                'name'       => "NT | Northern Territory",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Location::insert($insertArray);
    }
}
