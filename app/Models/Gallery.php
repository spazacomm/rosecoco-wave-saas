<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    use HasFactory;

    protected $fillable = ['user_id', 'images'];

    protected $table = 'gallery';

    protected $casts = [
        'images' => 'array', // Automatically convert JSON to array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
