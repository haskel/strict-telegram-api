<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class Chat
{
    public function __construct(
        public readonly int $id,
        public readonly string $type,
        public readonly ?string $title,
        public readonly ?string $username,
        public readonly ?string $firstName,
        public readonly ?string $lastName,
        public readonly ?ChatPhoto $photo,
        public readonly ?string $bio,
        public readonly ?bool $hasPrivateForwards,
        public readonly ?bool $hasRestrictedVoiceAndVideoMessages,
        public readonly ?bool $join_to_send_messages,
        public readonly ?bool $join_by_request,
        public readonly ?string $description,
        public readonly ?string $invite_link,
        public readonly ?Message $pinned_message,
        public readonly ?ChatPermissions $permissions,
        public readonly ?int $slow_mode_delay,
        public readonly ?int $message_auto_delete_time,
        public readonly ?bool $has_protected_content,
        public readonly ?string $sticker_set_name,
        public readonly ?bool $can_set_sticker_set,
        public readonly ?int $linked_chat_id,
        public readonly ?ChatLocation $location,

    ) {
    }

    public static function buildFromArray(array $senderChat)
    {
        return new self(
            id: $senderChat['id'],
            type: $senderChat['type'],
            title: $senderChat['title'] ?? null,
            username: $senderChat['username'] ?? null,
            firstName: $senderChat['first_name'] ?? null,
            lastName: $senderChat['last_name'] ?? null,
            photo: isset($senderChat['photo']) ? ChatPhoto::buildFromArray($senderChat['photo']) : null,
            bio: $senderChat['bio'] ?? null,
            hasPrivateForwards: $senderChat['has_private_forwards'] ?? null,
            hasRestrictedVoiceAndVideoMessages: $senderChat['has_restricted_voice_and_video_messages'] ?? null,
            join_to_send_messages: $senderChat['join_to_send_messages'] ?? null,
            join_by_request: $senderChat['join_by_request'] ?? null,
            description: $senderChat['description'] ?? null,
            invite_link: $senderChat['invite_link'] ?? null,
            pinned_message: isset($senderChat['pinned_message']) ? Message::buildFromArray($senderChat['pinned_message']) : null,
            permissions: isset($senderChat['permissions']) ? ChatPermissions::buildFromArray($senderChat['permissions']) : null,
            slow_mode_delay: $senderChat['slow_mode_delay'] ?? null,
            message_auto_delete_time: $senderChat['message_auto_delete_time'] ?? null,
            has_protected_content: $senderChat['has_protected_content'] ?? null,
            sticker_set_name: $senderChat['sticker_set_name'] ?? null,
            can_set_sticker_set: $senderChat['can_set_sticker_set'] ?? null,
            linked_chat_id: $senderChat['linked_chat_id'] ?? null,
            location: isset($senderChat['location']) ? ChatLocation::buildFromArray($senderChat['location']) : null,
        );
    }
}
