<?php

declare(strict_types=1);

namespace Haskel\Telegram\Api;

use Haskel\Telegram\Type\InputFile;
use Haskel\Telegram\Type\KeyboardMarkup;
use Haskel\Telegram\Type\MaskPosition;
use Haskel\Telegram\Type\StickerType;

class StickerApi
{
    public function sendSticker(
        int $chatId,
        string $sticker,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
        ?bool $allowSendingWithoutReply = null,
        ?KeyboardMarkup $replyMarkup = null
    ): void {
    }

    public function getStickerSet(string $name): array
    {
        return [];
    }

    public function getCustomEmojiStickers(array $customEmojiIds): array
    {
        return [];
    }

    public function uploadStickerFile(
        int $userId,
        InputFile $pngSticker,
    ): array {
        return [];
    }

    public function createNewStickerSet(
        int $userId,
        string $name,
        string $title,
        string $emojis,
        ?InputFile $pngSticker,
        ?InputFile $tgsSticker,
        ?InputFile $webmSticker,
        ?StickerType $stickerType,
        ?bool $isMasks = null,
        ?MaskPosition $maskPosition = null
    ): array {
        return [];
    }

    public function addStickerToSet(
        int $userId,
        string $name,
        string $emojis,
        ?InputFile $pngSticker,
        ?InputFile $tgsSticker,
        ?InputFile $webmSticker,
        ?MaskPosition $maskPosition = null
    ): array {
        return [];
    }

    public function setStickerPositionInSet(
        string $sticker,
        int $position
    ): array {
        return [];
    }

    public function deleteStickerFromSet(string $sticker): array {
        return [];
    }

    public function setStickerSetThumb(
        string $name,
        ?int $userId = null,
        InputFile|string $thumb = null
    ): array {
        return [];
    }
}
