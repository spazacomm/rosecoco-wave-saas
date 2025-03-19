<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_phone',
        'booking_time',
        'duration',
        'amount',
        'message',
        'status',
    ];

    protected $casts = [
        'booking_time' => 'datetime',
    ];

    // Relationship: Booking belongs to an Escort (User)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Scope: Get only confirmed bookings
    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }
}
