<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class Sticker
{
    public function __construct(
        public string $fileId,
        public int $width,
        public int $height,
        public ?PhotoSize $thumb = null,
        public ?string $emoji = null,
        public ?string $setName = null,
        public ?MaskPosition $maskPosition = null,
        public ?int $fileSize = null,
    ) {
    }

    public static function buildFromArray(mixed $sticker)
    {
        return new self(
            $sticker['file_id'],
            $sticker['width'],
            $sticker['height'],
            isset($sticker['thumb']) ? PhotoSize::buildFromArray($sticker['thumb']) : null,
            $sticker['emoji'] ?? null,
            $sticker['set_name'] ?? null,
            isset($sticker['mask_position']) ? MaskPosition::buildFromArray($sticker['mask_position']) : null,
            $sticker['file_size'] ?? null,
        );
    }
}
