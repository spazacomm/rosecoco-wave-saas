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
            
            

            if(empty($user->role)){

                Telegram::sendPhoto([
                    'chat_id' => $chatId,
                    'photo' => InputFile::create('https://rosecoco.co.ke/wave/img/rosec_logo.png'),
                    'caption' => "🌹 *Welcome to Rosecoco Bot* 🌹\nYour all-in-one assistant for Kenya's leading escort directory.\n\nWhether you're an *escort* looking to get listed or a *client* searching for a companion, I'm here to help you get started quickly and privately.",
                    'parse_mode' => 'Markdown'
                ]);

                // ask to select role
                Telegram::sendMessage([
                    'chat_id' => $chatId,
                    'text' => 'Who are you in this story?',
                    'reply_markup' => json_encode([
                        'inline_keyboard' => [
                            [
                                ['text' => '🧔 The Client', 'callback_data' => 'role_client'],
                                ['text' => '💃 The Escort', 'callback_data' => 'role_escort'],
                            ]
                        ]
                    ])
                ]);
                
            }
    
            if($user->role === 'client'){
                // give the cleint the browse escorts button.

                Telegram::sendMessage([
                    'chat_id' => $chatId,
                    'text' => 'Please enter your preferred search radius (km):',
                    'reply_markup' => json_encode(['force_reply' => true])
                ]);

                Telegram::sendMessage([
                    'chat_id' => $chatId,
                    'text' => "Let's help you find the perfect companion.",
                    'parse_mode' => 'Markdown',
                    'reply_markup' => json_encode([
                        'inline_keyboard' => [
                            [
                                ['text' => 'Browse Escorts', 'callback_data' => 'browse_escorts'],
                                ['text' => 'Browse Offers', 'callback_data' => 'browse_offers']
                            ]
                        ]
                    ])
                ]);
            }
    
            if($user->role === 'escort'){
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