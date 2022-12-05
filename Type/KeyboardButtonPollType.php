<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class KeyboardButtonPollType
{
    public function __construct(
        public ?string $type = null,
    ) {
    }

    public function toArray()
    {
        return [
            'type' => $this->type,
        ];
    }
}
