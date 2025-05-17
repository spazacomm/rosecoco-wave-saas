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
                'photo' => InputFile::create('https://rosecoco.co.ke/wave/img/rosec_logo.png'),
                'caption' => "🌹 *Welcome to Rosecoco Bot* 🌹\nYour all-in-one assistant for Kenya's leading escort directory.\n\nWhether you're an *escort* looking to get listed or a *client* searching for a companion, I'm here to help you get started quickly and privately.",
                'parse_mode' => 'Markdown'
            ]);
            

            if(empty($user->role)){
                // ask to select role
                Telegram::sendMessage([
                    'chat_id' => $chatId,
                    'text' => 'Who are you in this story?',
                    'reply_markup' => $this->replyMarkup()
                ]);
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


        public function replyMarkup(){

            $reply_markup = Keyboard::make()
                ->setResizeKeyboard(true)
                ->setOneTimeKeyboard(true)
                ->row([
                    Keyboard::button('1'),
                    Keyboard::button('2'),
                    Keyboard::button('3'),
                ])
                ->row([
                    Keyboard::button('4'),
                    Keyboard::button('5'),
                    Keyboard::button('6'),
                ])
                ->row([
                    Keyboard::button('7'),
                    Keyboard::button('8'),
                    Keyboard::button('9'),
                ])
                ->row([
                    Keyboard::button('0'),
                ]);

            return $reply_markup;
        }

    
}