<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class Animation
{
    public function __construct(
        public string $fileId,
        public string $fileUniqueId,
        public int $width,
        public int $height,
        public int $duration,
        public ?PhotoSize $thumb = null,
        public ?string $fileName = null,
        public ?string $mimeType = null,
        public ?int $fileSize = null,
    ) {
    }

    public static function buildFromArray(mixed $animation)
    {
        return new self(
            $animation['file_id'],
            $animation['file_unique_id'],
            $animation['width'],
            $animation['height'],
            $animation['duration'],
            isset($animation['thumb']) ? PhotoSize::buildFromArray($animation['thumb']) : null,
            $animation['file_name'] ?? null,
            $animation['mime_type'] ?? null,
            $animation['file_size'] ?? null,
        );
    }
}
