<?php

namespace App\Telegram\Services;

use App\Models\BotUser;

class BotUserService
{
    /**
     * Get user by Telegram ID.
     */
    public function getByTelegramId(string $telegramId): ?BotUser
    {
        return BotUser::where('telegram_id', $telegramId)->first();
    }

    /**
     * Create or update a user by Telegram ID.
     */
    public function updateOrCreateByTelegramId(string $telegramId, array $data): BotUser
    {
        return BotUser::updateOrCreate(
            ['telegram_id' => $telegramId],
            $data
        );
    }

    /**
     * Update a bot user's profile fields.
     */
    public function updateProfile(BotUser $user, array $data): BotUser
    {
        $user->update($data);
        return $user;
    }

    /**
     * Ban or unban a user.
     */
    public function setBanStatus(BotUser $user, bool $status = true): BotUser
    {
        $user->is_banned = $status;
        $user->save();
        return $user;
    }

    /**
     * Mark user as onboarded.
     */
    public function markAsOnboarded(BotUser $user): BotUser
    {
        $user->is_onboarded = true;
        $user->save();
        return $user;
    }

    /**
     * Add media (image, video, etc.) to a user's media field.
     */
    public function addMedia(BotUser $user, string $mediaPath): BotUser
    {
        $media = $user->media ?? [];
        $media[] = $mediaPath;
        $user->media = $media;
        $user->save();
        return $user;
    }
}
