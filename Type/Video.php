<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class Video
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

    public static function buildFromArray(mixed $video)
    {
        return new self(
            $video['file_id'],
            $video['file_unique_id'],
            $video['width'],
            $video['height'],
            $video['duration'],
            isset($video['thumb']) ? PhotoSize::buildFromArray($video['thumb']) : null,
            $video['file_name'] ?? null,
            $video['mime_type'] ?? null,
            $video['file_size'] ?? null,
        );
    }
}
