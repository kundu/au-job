<?php

namespace Database\Seeders;

use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
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
                'id'         => 1,
                'name'       => "Australia",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        Country::insert($insertArray);
    }
}
