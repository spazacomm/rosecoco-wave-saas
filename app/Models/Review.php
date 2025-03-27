<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //

    protected $fillable = ['user_id', 'name', 'email', 'phone', 'booking_date', 'review', 'rating', 'is_approved'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function averageRating()
    {
        return self::avg('rating');
    }

}
