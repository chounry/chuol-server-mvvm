<?php

use Illuminate\Database\Seeder;

use App\City;
use App\HouseType;
use App\UserType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // city type
        City::create(['name' => 'Phnom Penh']);
        City::create(['name' => 'Kompot']);
        City::create(['name' => 'Kompong Chhnang']);
        City::create(['name' => 'Kandal']);
        City::create(['name' => 'KPS']);


        // house type
        HouseType::create(['name' => 'Villa']);
        HouseType::create(['name' => 'Flat']);
        HouseType::create(['name' => 'Twin House']);

        // user type
        UserType::create(['name' => 'Admin']);
        UserType::create(['name' => 'Member']);

        // 

    }
}
