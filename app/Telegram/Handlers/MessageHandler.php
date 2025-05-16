<?php

namespace App\Telegram\Handlers;

use Telegram\Bot\Objects\Update;
use App\Models\BotUser;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class MessageHandler
{
    


    public function handle(Update $update): void
    {
        \Log::info('in the message handler');
    }

  
}