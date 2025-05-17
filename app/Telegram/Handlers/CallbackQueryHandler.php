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
        $chat = $callbackQuery->getMessage()->getChat();
        $from = $callbackQuery->getFrom();

        $chatId = $chat->getId();
        $telegramUserId = $from->getId();
        $telegramUsername = $from->getUsername();
        $telegramName = $from->getFirstName();

        try {
            // Get or create user
            $user = $this->botUserService->updateOrCreateByTelegramId($telegramUserId, [
                'name' => $telegramName,
            ]);

            match ($callbackData) {
                'role_client' => $this->handleClientRole($chatId, $user),
                'role_escort' => $this->handleEscortRole($chatId, $user),
                'browse_escorts' => $this->handleBrowseEscorts($chatId),
                default => $this->handleUnknown($chatId)
            };
        } catch (\Exception $e) {
            Log::error('Callback query error: ' . $e->getMessage(), ['callback_data' => $callbackData]);

            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => '🚨 An error occurred. Please try again later.'
            ]);
        }
    }

    protected function handleClientRole(int|string $chatId, $user): void
    {
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

    protected function handleEscortRole(int|string $chatId, $user): void
    {
        $this->botUserService->updateProfile($user, ['role' => 'escort']);

        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => "✅ You've been set as an *Escort*. Let's get your profile started!",
            'parse_mode' => 'Markdown'
        ]);
    }

    protected function handleBrowseEscorts(int|string $chatId): void
    {
        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => "👀 Here’s our escort list (coming soon)",
            'parse_mode' => 'Markdown'
        ]);
    }

    protected function handleUnknown(int|string $chatId): void
    {
        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => "🤔 Sorry, I didn't understand that option."
        ]);
    }
}
