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

        $chatId = $this->getUpdate()->getMessage()->getChat()->getId();
        
        try {
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => 'Welcome to Rosecoco help center'
            ]);
        } catch (\Exception $e) {
            Log::error('Telegram Error: ' . $e->getMessage());
            dd($e->getMessage());
        }
        

       
    }

    
}