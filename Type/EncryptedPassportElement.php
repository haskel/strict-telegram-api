<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class EncryptedPassportElement
{
    public function __construct(
        public string $type,
        public string $data,
        public string $phoneNumber,
        public string $email,
        public PassportFile $files,
        public PassportFile $frontSide,
        public PassportFile $reverseSide,
        public PassportFile $selfie,
        public PassportFile $translation,
        public string $hash,
    ) {
    }

    public static function buildFromArray(array $data): self
    {
        return new self(
            $data['type'],
            $data['data'],
            $data['phone_number'],
            $data['email'],
            PassportFile::buildFromArray($data['files']),
            PassportFile::buildFromArray($data['front_side']),
            PassportFile::buildFromArray($data['reverse_side']),
            PassportFile::buildFromArray($data['selfie']),
            PassportFile::buildFromArray($data['translation']),
            $data['hash'],
        );
    }

}
