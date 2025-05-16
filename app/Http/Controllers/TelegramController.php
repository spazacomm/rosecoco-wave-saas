<?php

namespace App\Http\Controllers;

use Telegram;
use App\Telegram\Handlers\CallbackQueryHandler;
use App\Telegram\Handlers\MessageHandler;
use App\Models\BotUser;

class TelegramController extends Controller
{
    protected CallbackQueryHandler $callbackQueryHandler;
    protected MessageHandler $messageHandler;

    public function __construct(
        CallbackQueryHandler $callbackQueryHandler,
        MessageHandler $messageHandler
    ) {
        $this->callbackQueryHandler = $callbackQueryHandler;
        $this->messageHandler = $messageHandler;
    }

    public function handle()
    {
        $update = Telegram::getWebhookUpdate();

        \Log::info('in teh controller');

        $chatId = $update->getMessage()->getChat()->getId();
        $user = $this->getUser($chatId);

        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => 'Welcome to Rosecoco.'
        ]); 

        // Handle commands
       // Telegram::commandsHandler(true);

        // Handle callback queries
        // if ($update->getCallbackQuery()) {
        //     $this->callbackQueryHandler->handle($update);
        // }

        // Handle messages (text, media, location)
        // if ($update->getMessage()) {
        //     $this->messageHandler->handle($update);
        // }

        return response('OK', 200);
    }

    public function getUser($telegramId){

        return BotUser::firstOrCreate(
            ['telegram_id' => $telegramId],
            [
                'is_onboarded' => false
            ]
        );
    }
    
}