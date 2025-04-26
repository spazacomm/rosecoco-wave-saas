<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \DB::table('services')->delete();

        // Define services as an array
        $services = [
            'Escorts', 'Massage', 'BDSM', 'Roleplay', 'Fetish', 'Threesome', 'Lingerie', 'Private Sessions',
            'Fantasy', 'Cuddling', 'Escort for Couples', 'Luxury Escorts', 'Escort Services for Men', 'Gay Escorts',
            'Lesbian Escorts', 'Bisexual Escorts', 'Asian Escorts', 'Indian Escorts', 'Black Escorts', 'Escort Escorts'
        ];

        // Loop through and create each service
        foreach ($services as $service) {
            Service::create([
                'name' => $service,
                'slug' => \Str::slug($service),
            ]);
        }
        
    }
}
