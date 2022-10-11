<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class MessageEntity
{
    public function __construct(
        public MessageEntityType $type,
        public int $offset,
        public int $length,
        public ?string $url = null,
        public ?User $user = null,
        public ?string $language = null,
        public ?string $customEmojiId = null,
    ) {
    }

    public static function buildFromArray(mixed $entity)
    {
        return new self(
            MessageEntityType::tryFrom($entity['type']),
            $entity['offset'],
            $entity['length'],
            $entity['url'] ?? null,
            isset($entity['user']) ? User::buildFromArray($entity['user']) : null,
            $entity['language'] ?? null,
            $entity['custom_emoji_id'] ?? null,
        );
    }
}
