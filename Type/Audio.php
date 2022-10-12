<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class Audio
{
    public function __construct(
        public string $fileId,
        public string $fileUniqueId,
        public int $width,
        public ?string $performer = null,
        public ?string $title = null,
        public ?string $mimeType = null,
        public ?int $fileSize = null,
        public ?PhotoSize $thumb = null,
    ) {
    }

    public static function buildFromArray(mixed $audio)
    {
        return new self(
            $audio['file_id'],
            $audio['file_unique_id'],
            $audio['duration'],
            $audio['performer'] ?? null,
            $audio['title'] ?? null,
            $audio['mime_type'] ?? null,
            $audio['file_size'] ?? null,
            isset($audio['thumb']) ? PhotoSize::buildFromArray($audio['thumb']) : null,
        );
    }
}
