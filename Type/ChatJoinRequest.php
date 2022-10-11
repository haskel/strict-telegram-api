<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class ChatJoinRequest
{
    public function __construct(
        public User $invitedBy,
        public User $user,
    ) {
    }

    public static function buildFromArray(mixed $chat_join_request)
    {
        return new self(
            User::buildFromArray($chat_join_request['invited_by']),
            User::buildFromArray($chat_join_request['user']),
        );
    }
}
