<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class Document
{
    public function __construct(
        public readonly string $fileId,
        public readonly string $fileUniqueId,
        public readonly ?PhotoSize $thumb = null,
        public readonly ?string $fileName = null,
        public readonly ?string $mimeType = null,
        public readonly ?int $fileSize = null,
    ) {
    }

    public static function buildFromArray(mixed $document)
    {
        return new self(
            $document['file_id'],
            $document['file_unique_id'],
            isset($document['thumb']) ? PhotoSize::buildFromArray($document['thumb']) : null,
            $document['file_name'] ?? null,
            $document['mime_type'] ?? null,
            $document['file_size'] ?? null,
        );
    }
}
