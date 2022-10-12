<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class VideoNote
{
    public function __construct(
        public readonly string $fileId,
        public readonly string $fileUniqueId,
        public readonly int $length,
        public readonly int $duration,
        public readonly ?PhotoSize $thumb = null,
        public readonly ?int $fileSize = null,
    ) {
    }

    public static function buildFromArray(mixed $video_note)
    {
        return new self(
            $video_note['file_id'],
            $video_note['file_unique_id'],
            $video_note['length'],
            $video_note['duration'],
            isset($video_note['thumb']) ? PhotoSize::buildFromArray($video_note['thumb']) : null,
            $video_note['file_size'] ?? null,
        );
    }
}
