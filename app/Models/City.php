<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * Get the predefined escort types.
     *
     * @return array
     */
    public static function getCities()
    {
        return [
            'Nairobi',
            'Mombasa',
            'Nakuru'
            // Add more types as needed
        ];
    }
}
