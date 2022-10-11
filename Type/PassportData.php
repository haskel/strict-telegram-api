<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class PassportData
{
    public function __construct(
        /** @var $data EncryptedPassportElement[] */
        public readonly array $data,
        public readonly EncryptedCredentials $credentials
    ) {
    }

    public static function buildFromArray(mixed $passport_data)
    {
        return new self(
            array_map(fn($data) => EncryptedPassportElement::buildFromArray($data), $passport_data['data']),
            EncryptedCredentials::buildFromArray($passport_data['credentials'])
        );
    }
}
