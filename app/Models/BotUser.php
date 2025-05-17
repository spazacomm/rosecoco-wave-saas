<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BotUser extends Model
{
    protected $fillable = [
        'ref',
        'telegram_id',
        'name',
        'username',
        'phone_number',
        'role',
        'locations',
        'services',
        'rates',
        'media',
        'is_banned',
        'is_onboarded',
        'is_boosted',
        'bio',
        'incall',
        'outcall',
        'country_id',
    ];

    protected $casts = [
        'media' => 'array',
        'is_banned' => 'boolean',
        'is_onboarded' => 'boolean',
        'is_boosted' => 'boolean',
        'incall' => 'boolean',
        'outcall' => 'boolean',
    ];
}
