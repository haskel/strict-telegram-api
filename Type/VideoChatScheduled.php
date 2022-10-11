<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class VideoChatScheduled
{
    public function __construct(
        public int $startDate
    ) {
    }

    public static function buildFromArray(mixed $video_chat_scheduled)
    {
        return new self(
            $video_chat_scheduled['start_date']
        );
    }
}
