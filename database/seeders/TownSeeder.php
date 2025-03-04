<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Town;

class TownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $nairobi = City::where('name', 'Nairobi')->first();

        Town::create(['name' => 'Kitale', 'city_id' => $nairobi->id]);
        Town::create(['name' => 'Ongata Rongai', 'city_id' => $nairobi->id]);
    }
}
