<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class OrderInfo
{
    public function __construct(
        public ?string $name,
        public ?string $phoneNumber,
        public ?string $email,
        public ?ShippingAddress $shippingAddress,
    ) {
    }

    public static function buildFromArray(mixed $order_info): self
    {
        return new self(
            name: $order_info['name'] ?? null,
            phoneNumber: $order_info['phone_number'] ?? null,
            email: $order_info['email'] ?? null,
            shippingAddress: isset($order_info['shipping_address']) ? ShippingAddress::buildFromArray($order_info['shipping_address']) : null,
        );
    }

}
