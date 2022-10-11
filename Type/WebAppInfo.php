<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class WebAppInfo
{
    public function __construct(
        public readonly string $url,
    ) {
    }

    public static function buildFromArray(mixed $webAppInfo): self
    {
        return new self(
            $webAppInfo['url'],
        );
    }
}
