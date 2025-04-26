<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \DB::table('services')->delete();

        \DB::table('services')->insert(array(
            array(
                'id' => 1,
                'parent_id' => NULL,
                'order' => 1,
                'name' => '69',
                'slug' => '69',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 2,
                'parent_id' => NULL,
                'order' => 2,
                'name' => 'A Level',
                'slug' => 'a-level',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 3,
                'parent_id' => NULL,
                'order' => 3,
                'name' => 'BDSM',
                'slug' => 'bdsm',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 4,
                'parent_id' => NULL,
                'order' => 4,
                'name' => 'CIF',
                'slug' => 'cif',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 5,
                'parent_id' => NULL,
                'order' => 5,
                'name' => 'CIM',
                'slug' => 'cim',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 6,
                'parent_id' => NULL,
                'order' => 6,
                'name' => 'COB',
                'slug' => 'cob',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 7,
                'parent_id' => NULL,
                'order' => 7,
                'name' => 'Deep Throat',
                'slug' => 'deep-throat',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 8,
                'parent_id' => NULL,
                'order' => 8,
                'name' => 'DFK',
                'slug' => 'dfk',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 9,
                'parent_id' => NULL,
                'order' => 9,
                'name' => 'Fetish',
                'slug' => 'fetish',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 10,
                'parent_id' => NULL,
                'order' => 10,
                'name' => 'Fisting',
                'slug' => 'fisting',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 11,
                'parent_id' => NULL,
                'order' => 11,
                'name' => 'GFE',
                'slug' => 'gfe',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 12,
                'parent_id' => NULL,
                'order' => 12,
                'name' => 'Massage',
                'slug' => 'massage',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 13,
                'parent_id' => NULL,
                'order' => 13,
                'name' => 'OWO',
                'slug' => 'owo',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 14,
                'parent_id' => NULL,
                'order' => 14,
                'name' => 'Rimming',
                'slug' => 'rimming',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 15,
                'parent_id' => NULL,
                'order' => 15,
                'name' => 'Role Play',
                'slug' => 'role-play',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 16,
                'parent_id' => NULL,
                'order' => 16,
                'name' => 'Striptease',
                'slug' => 'striptease',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 17,
                'parent_id' => NULL,
                'order' => 17,
                'name' => 'Watersports',
                'slug' => 'watersports',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            array(
                'id' => 18,
                'parent_id' => NULL,
                'order' => 18,
                'name' => 'Elderly Companion',
                'slug' => 'elderly-companion',
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ));
        
    }
}
