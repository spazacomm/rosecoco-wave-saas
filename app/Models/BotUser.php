<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BotUser extends Model
{
    //
    protected $fillable = [
        'name', 'telegram_id', 'username', 'bio'
    ];
}
