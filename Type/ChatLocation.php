<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class ChatLocation
{
    public function __construct(
        public readonly float $longitude,
        public readonly float $latitude,
    ) {
    }

    public static function buildFromArray(mixed $location)
    {
        return new self(
            longitude: $location['longitude'],
            latitude: $location['latitude'],
        );
    }
}
