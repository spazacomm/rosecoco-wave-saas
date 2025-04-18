<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('themes')->delete();
        
        \DB::table('themes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Anchor Theme',
                'folder' => 'anchor',
                'active' => 0,
                'version' => 1.0
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Rosec Theme',
                'folder' => 'rosec',
                'active' => 1,
                'version' => 1.0
            )
        ));
        
        
    }
}