<?php 

namespace App\Telegram\Services;

use App\Models\User;
use Telegram\Bot\Objects\Update;
use Telegram;
use Telegram\Bot\FileUpload\InputFile;

class EscortBrowseService
{
    public function startBrowsing(Update $update): void
    {
        \Log::info('start browsing escorts');
        $this->sendRandomEscort($update);
    }

    public function browseNext(Update $update): void
    {
        \Log::info('start browsing next escorts');
        $messageId = $update->getCallbackQuery()->getMessage()->getMessageId();
        $this->sendRandomEscort($update, $messageId);
    }

    protected function sendRandomEscort(Update $update, ?int $messageId = null): void
    {
        \Log::info('start browsing random escorts');
        $chatId = $update->getCallbackQuery()->getMessage()->getChat()->getId();
        $escort = User::inRandomOrder()->first();

        \Log::info(['escort'=> $escort]);

        if (!$escort) {
            Telegram::editMessageText([
                'chat_id' => $chatId,
                'message_id' => $messageId,
                'text' => '😔 No escorts available right now.',
            ]);
            return;
        }

        $text = "*{$escort->username}, {$escort->age}*\n";
        //$text .= "📍 _" . implode(', ', (array) $escort->locations) . "_\n";
       // $text .= "💋 _" . implode(', ', (array) $escort->services) . "_\n\n";
        $text .= "{$escort->bio}";

        //$imageUrl = is_array($escort->avatar) ? $escort->media[0] ?? null : json_decode($escort->media)[0] ?? null;
        $imageUrl  = storage_path($escort->avatar);
        $keyboard = [
            'inline_keyboard' => [
                [['text' => '➡️ Next', 'callback_data' => 'browse_next_escort']]
            ]
        ];

        if ($messageId && $imageUrl) {
            Telegram::editMessageMedia([
                'chat_id' => $chatId,
                'message_id' => $messageId,
                'media' => json_encode([
                    'type' => 'photo',
                    'media' => InputFile::create($imageUrl),
                    'caption' => $text,
                    'parse_mode' => 'Markdown',
                ]),
                'reply_markup' => json_encode($keyboard),
            ]);
        } else {
            Telegram::sendPhoto([
                'chat_id' => $chatId,
                'photo' => InputFile::create($imageUrl),
                'caption' => $text,
                'parse_mode' => 'Markdown',
                'reply_markup' => json_encode($keyboard),
            ]);
        }
    }
}
