<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();

        // Define services as an array
        $Categories = [
            'Escorts', 'Massage', 'BDSM', 'Roleplay', 'Fetish', 'Threesome', 'Lingerie', 'Private Sessions',
            'Fantasy', 'Cuddling', 'Escort for Couples', 'Luxury Escorts', 'Escort Services for Men', 'Gay Escorts',
            'Lesbian Escorts', 'Bisexual Escorts', 'Asian Escorts', 'Indian Escorts', 'Black Escorts', 'Escort Escorts'
        ];

        // Loop through and create each service
        foreach ($Categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => \Str::slug($category),
            ]);
        }   
        
    }
}