<?php

declare(strict_types=1);

namespace Haskel\Telegram\Api;

use Haskel\Telegram\Type\InlineKeyboardMarkup;

class GameApi
{
    public function sendGame(
        int $chatId,
        string $gameShortName,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
        ?bool $allowSendingWithoutReply = null,
        ?InlineKeyboardMarkup $replyMarkup = null
    ): array {
        return [];
    }

    public function setGameScore(
        int $userId,
        int $score,
        ?bool $force = null,
        ?bool $disableEditMessage = null,
        ?int $chatId = null,
        ?int $messageId = null,
        ?string $inlineMessageId = null
    ): array {
        return [];
    }

    public function getGameHighScores(
        int $userId,
        ?int $chatId = null,
        ?int $messageId = null,
        ?string $inlineMessageId = null
    ): array {
        return [];
    }
}
