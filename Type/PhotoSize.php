<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class PhotoSize
{
    public function __construct(
        public string $fileId,
        public string $fileUniqueId,
        public int $width,
        public int $height,
        public ?int $fileSize = null,
    ) {
    }

    public static function buildFromArray(mixed $photo)
    {
        return new self(
            $photo['file_id'],
            $photo['file_unique_id'],
            $photo['width'],
            $photo['height'],
            $photo['file_size'] ?? null,
        );
    }
}
