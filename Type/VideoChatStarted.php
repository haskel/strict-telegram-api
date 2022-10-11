<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class VideoChatStarted
{
    public function __construct(
        public int $duration
    ) {
    }

    public static function buildFromArray(mixed $video_chat_started)
    {
        return new self(
            $video_chat_started['duration']
        );
    }
}
