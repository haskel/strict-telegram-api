<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class EncryptedCredentials
{
    public function __construct(
        public string $data,
        public string $hash,
        public string $secret,
    ) {
    }

    public static function buildFromArray(mixed $credentials)
    {
        return new self(
            $credentials['data'],
            $credentials['hash'],
            $credentials['secret'],
        );
    }
}
