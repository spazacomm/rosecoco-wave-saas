<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    use HasFactory;

    /**
     * Get the predefined escort types.
     *
     * @return array
     */
    public static function getLocations()
    {
        return [
            'CBD',
            'Westlands',
            // Add more types as needed
        ];
    }
}
