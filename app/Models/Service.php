<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = ['name', 'description'];


    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }


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
