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

    public function toArray()
    {
        return [
            'url' => $this->url,
            'forward_text' => $this->forwardText,
            'bot_username' => $this->botUsername,
            'request_write_access' => $this->requestWriteAccess,
        ];
    }

}
