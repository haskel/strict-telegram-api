<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class LoginUrl
{
    public function __construct(
        public readonly string $url,
        public readonly ?string $forwardText = null,
        public readonly ?string $botUsername = null,
        public readonly ?bool $requestWriteAccess = null,
    ) {
    }

    public static function buildFromArray(mixed $loginUrl): self
    {
        return new self(
            $loginUrl['url'],
            $loginUrl['forward_text'] ?? null,
            $loginUrl['bot_username'] ?? null,
            $loginUrl['request_write_access'] ?? null,
        );
    }

}
