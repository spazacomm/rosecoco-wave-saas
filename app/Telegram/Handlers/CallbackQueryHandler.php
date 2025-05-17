<?php

namespace App\Telegram\Handlers;

use Telegram\Bot\Objects\Update;
use Illuminate\Support\Facades\Log;
use App\Telegram\Services\BotUserService;
use Telegram;

class CallbackQueryHandler
{
    protected BotUserService $botUserService;

    public function __construct(BotUserService $botUserService)
    {
        $this->botUserService = $botUserService;
    }

    public function handle(Update $update): void
    {
        Log::info('In the callback query handler');

        $callbackQuery = $update->getCallbackQuery();
        $callbackData = $callbackQuery->getData();
        $chatId = $callbackQuery->getMessage()->getChat()->getId();
        $telegramUserId = $callbackQuery->getFrom()->getId();
        $telegramUsername = $callbackQuery->getFrom()->getUsername();
        $telegramName = $callbackQuery->getFrom()->getFirstName();

        try {
            // Get or create user
            $user = $this->botUserService->updateOrCreateByTelegramId($telegramUserId, [
                'name' => $telegramName,
            ]);

            if ($callbackData === 'role_client') {
                $this->botUserService->updateProfile($user, ['role' => 'client']);
                Telegram::sendMessage([
                    'chat_id' => $chatId,
                    'text' => "✅ You've been set as a *Client*. Let's help you find the perfect companion.",
                    'parse_mode' => 'Markdown',
                    'reply_markup' => json_encode([
                        'inline_keyboard' => [
                            [
                                ['text' => 'Browse Escorts', 'callback_data' => 'browse_escorts']
                            ]
                        ]
                    ])
                ]);
                
            }

            if ($callbackData === 'role_escort') {
                $this->botUserService->updateProfile($user, ['role' => 'escort']);
                Telegram::sendMessage([
                    'chat_id' => $chatId,
                    'text' => "✅ You've been set as an *Escort*. Let's get your profile started!",
                    'parse_mode' => 'Markdown'
                ]);
            }


            if ($callbackData === 'browse_escorts') {
                
                Telegram::sendMessage([
                    'chat_id' => $chatId,
                    'text' => "Here;s our escort list",
                    'parse_mode' => 'Markdown'
                ]);
            }

        } catch (\Exception $e) {
            Log::error('Callback query error: ' . $e->getMessage(), ['callback_data' => $callbackData]);

            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => '🚨 An error occurred. Please try again later.'
            ]);
        }
    }
}
