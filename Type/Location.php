<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class Location
{
    public function __construct(
        public float $longitude,
        public float $latitude,
    ) {
    }

    public static function buildFromArray(mixed $location)
    {
        return new self(
            $location['longitude'],
            $location['latitude'],
        );
    }
}
