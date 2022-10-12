<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class User
{
    public function __construct(
        public int $id,
        public bool $isBot,
        public ?string $firstName,
        public ?string $lastName,
        public ?string $username,
        public ?string $languageCode,
        public ?bool $isPremium,
        public ?bool $addedToAttachmentMenu,
        public ?bool $canJoinGroups,
        public ?bool $canReadAllGroupMessages,
        public ?bool $supportsInlineQueries,
    ) {
    }

    public static function buildFromArray(array $from)
    {
        return new self(
            id: $from['id'],
            isBot: $from['is_bot'],
            firstName: $from['first_name'] ?? null,
            lastName: $from['last_name'] ?? null,
            username: $from['username'] ?? null,
            languageCode: $from['language_code'] ?? null,
            isPremium: $from['is_premium'] ?? null,
            addedToAttachmentMenu: $from['added_to_attachment_menu'] ?? null,
            canJoinGroups: $from['can_join_groups'] ?? null,
            canReadAllGroupMessages: $from['can_read_all_group_messages'] ?? null,
            supportsInlineQueries: $from['supports_inline_queries'] ?? null,
        );
    }
}
