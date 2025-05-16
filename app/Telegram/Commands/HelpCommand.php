<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;
use App\Models\BotUser;
use Telegram;

class HelpCommand extends Command
{
    protected string $name = 'help';
    protected string $description = 'bot help';

    public function handle()
    {

        \Log::info('in the help command');

        $chatId = $update->getMessage()->getChat()->getId();
        
        Telegram::sendPhoto([
            'chat_id' => $chatId,
            'photo' => 'https://rosecoco.co.ke/themes/rosec/images/rose_logo_bg.png',
            'caption' => 'Welcome to Rosecoco'
        ]);

       
    }

    
}