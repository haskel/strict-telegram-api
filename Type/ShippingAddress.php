<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class ShippingAddress
{
    public function __construct(
        public string $countryCode,
        public string $state,
        public string $city,
        public string $streetLine1,
        public string $streetLine2,
        public string $postCode,
    ) {
    }

    public static function buildFromArray(mixed $shippingAddress): self
    {
        return new self(
            countryCode: $shippingAddress['country_code'],
            state: $shippingAddress['state'],
            city: $shippingAddress['city'],
            streetLine1: $shippingAddress['street_line1'],
            streetLine2: $shippingAddress['street_line2'],
            postCode: $shippingAddress['post_code'],
        );
    }
}
