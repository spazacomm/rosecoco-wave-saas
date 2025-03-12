<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = ['name', 'description'];

    /**
     * Get an array of service IDs and names.
     *
     * @return array
     */
    public static function getServices()
    {
        return self::pluck('name', 'id')->toArray();
    }
   
}
