<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Country;
use App\Models\City;
use App\Models\Town;

class KenyaLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \DB::table('countries')->delete();
        \DB::table('cities')->delete();
        \DB::table('towns')->delete();


        // Create Kenya
        $kenya = Country::create([
            'name' => 'Kenya',
        ]);

        // Cities and their towns
        $cities = [
            'Nairobi' => [
                'Westlands', 'Karen', 'Kilimani', 'Langata', 'Eastleigh', 'Runda', 'Lavington', 'Kileleshwa',
                'South B', 'South C', 'Embakasi', 'Umoja', 'Buruburu', 'Gikambura', 'Kahawa', 'Roysambu', 'Kasarani',
                'Ruaka', 'Kikuyu', 'Kangemi', 'Pangani', 'Parklands', 'Syokimau', 'Donholm', 'Jogoo Road', 'Ngong Road',
                'Upper Hill', 'CBD', 'Mirema', 'Ongata Rongai', 'Kitengela', 'Ngong', 'Kiserian', 'Lower Kabete', 'Uthiru', '87', 'Limuru', 'Mlolongo', 'Syokimau', 'Great Wall', 'Ngara',
            ],
            'Mombasa' => [
                'Nyali', 'Likoni', 'Bamburi', 'Mtwapa', 'Changamwe', 'Kisauni', 'Tudor', 'Makupa', 'Kongowea', 'Shanzu',
                'Port Reitz', 'Mikindani', 'Airport Road', 'Ganjoni', 'Shelly Beach', 'Miritini',
            ],
            'Kisumu' => [
                'Milimani', 'Kondele', 'Nyalenda', 'Manyatta', 'Otonglo', 'Mamboleo', 'Nyamasaria', 'Migosi', 'Kibuye',
                'Obunga', 'Airport Road', 'Kanyakwar', 'Dunga', 'Kiboswa', 'Riat Hills',
            ],
            'Nakuru' => [
                'Lanet', 'Kiamunyi', 'Free Area', 'Pipeline', 'Shabab', 'Section 58', 'London Estate', 'Milimani Estate',
                'White House', 'Naka', 'Barnabas', 'Bahati', 'Kabarak', 'Menengai', 'Kaptembwa', 'Racecourse',
            ],
            'Eldoret' => [
                'Kapsoya', 'Langas', 'Elgon View', 'Huruma', 'Maili Nne', 'West Indies', 'Pioneer', 'Kimumu', 'Chepkoilel',
                'Kahoya', 'Action Area', 'Annex', 'Munyaka', 'Outspan', 'Kipkaren', 'Sosiani',
            ],
        ];

        foreach ($cities as $cityName => $towns) {
            $city = City::create([
                'country_id' => $kenya->id,
                'name' => $cityName,
            ]);

            foreach ($towns as $townName) {
                Town::create([
                    'city_id' => $city->id,
                    'name' => $townName,
                    'slug' => Str::slug($townName),
                ]);
            }
        }
    }
}
