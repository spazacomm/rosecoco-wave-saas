<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;
use App\Models\BotUser;
use Telegram;
use Telegram\Bot\FileUpload\InputFile;


class StartCommand extends Command
{
    protected string $name = 'start';
    protected string $description = 'Start the bot';

    public function handle()
    {

        \Log::info('in the start command');

        $chatId = $this->getUpdate()->getMessage()->getChat()->getId();
        $user = BotUser::where('telegram_id', $chatId)->first();

        try {
            Telegram::sendPhoto([
                'chat_id' => $chatId,
                'photo' => InputFile::create('https://rosecoco.co.ke/themes/rosec/images/rose_logo_bg.png'),
                'caption' => 'Welcome to Rosecoco'
            ]);

            if(empty($user->role)){
                // ask to select role
            }
    
            if($user->role == 'client'){
                // give the cleint the browse escorts button.
            }
    
            if($user->role == 'escort'){
                // give the cleint the browse escorts button.
            }

        } catch (\Exception $e) {
            Log::error('Telegram Error: ' . $e->getMessage());
            dd($e->getMessage());
        }
        

        

        
    }

    
}