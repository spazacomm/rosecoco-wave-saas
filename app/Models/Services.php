<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    /**
     * Get the predefined escort types.
     *
     * @return array
     */
    public static function getServices()
    {
        return [
            'BDSM',
            'GFE',
            // Add more types as needed
        ];
    }
}
