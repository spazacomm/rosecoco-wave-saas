<?php

namespace App\Telegram\Handlers;

use Telegram\Bot\Objects\Update;

use Illuminate\Support\Facades\Log;

class CallbackQueryHandler
{
    


    public function handle(Update $update): void
    {

        \Log::info('in the query handler');

        $callbackQuery = $update->getCallbackQuery();
        $callbackData = $callbackQuery->getData();
        $chatId = $callbackQuery->getMessage()->getChat()->getId();
        $telegramUserId = $callbackQuery->getFrom()->getId();

        try {
            

            

        } catch (\Exception $e) {
            Log::error('Callback query error: ' . $e->getMessage(), ['callback_data' => $callbackData]);
           
        }
    }
}
