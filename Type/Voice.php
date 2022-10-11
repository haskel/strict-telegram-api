<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class Voice
{
    public function __construct(
        public readonly string $fileId,
        public readonly string $fileUniqueId,
        public readonly int $duration,
        public readonly ?string $mimeType,
        public readonly ?int $fileSize,
    ) {
    }

    public static function buildFromArray(mixed $voice)
    {
        return new self(
            $voice['file_id'],
            $voice['file_unique_id'],
            $voice['duration'],
            $voice['mime_type'] ?? null,
            $voice['file_size'] ?? null,
        );
    }
}
