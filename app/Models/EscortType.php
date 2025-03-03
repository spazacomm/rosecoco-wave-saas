<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EscortType extends Model
{
    use HasFactory;

    /**
     * Get the predefined escort types.
     *
     * @return array
     */
    public static function getEscortTypes()
    {
        return [
            'A-Level Escorts',
            'Party Escorts',
            'Adventure Escorts',
            'Corporate Escorts',
            // Add more types as needed
        ];
    }
}
