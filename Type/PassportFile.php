<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class PassportFile
{
    public function __construct(
        public string $fileId,
        public int $fileSize,
        public int $fileDate
    ) {
    }

    public static function buildFromArray(mixed $files)
    {
        return new self(
            $files['file_id'],
            $files['file_size'],
            $files['file_date']
        );
    }
}
