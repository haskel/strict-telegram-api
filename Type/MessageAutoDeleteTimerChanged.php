<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class MessageAutoDeleteTimerChanged
{
    public function __construct(
        public int $messageAutoDeleteTime
    ) {
    }

    public static function buildFromArray(mixed $message_auto_delete_timer_changed)
    {
        return new self(
            $message_auto_delete_timer_changed['message_auto_delete_time']
        );
    }
}
