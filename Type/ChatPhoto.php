<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class ChatPhoto
{
    public function __construct(
        public readonly string $smallFileId,
        public readonly string $smallFileUniqueId,
        public readonly string $bigFileId,
        public readonly string $bigFileUniqueId,
    ) {
    }

    public static function buildFromArray(array $photo)
    {
        return new self(
            $photo['small_file_id'],
            $photo['small_file_unique_id'],
            $photo['big_file_id'],
            $photo['big_file_unique_id'],
        );
    }
}
