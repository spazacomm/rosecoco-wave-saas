<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    /**
     * Get the predefined escort types.
     *
     * @return array
     */
    public static function getCountries()
    {
        return [
            'Kenya',
            'Uganda',
            'Tanzania'
            // Add more types as needed
        ];
    }
}
