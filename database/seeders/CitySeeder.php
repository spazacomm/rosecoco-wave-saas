<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $kenya = Country::where('name', 'Kenya')->first();
    

        City::create(['name' => 'Nairobi', 'country_id' => $kenya->id]);
    
    }
}
