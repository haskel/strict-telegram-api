<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class VideoChatParticipantsInvited
{
    public function __construct(
        /**@var $users User[] */
        public array $users
    ) {
    }

    public static function buildFromArray(mixed $video_chat_participants_invited)
    {
        return new self(
            array_map(fn($user) => User::buildFromArray($user), $video_chat_participants_invited['users'])
        );
    }
}
