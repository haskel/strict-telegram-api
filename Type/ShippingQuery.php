<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class ShippingQuery
{
    public function __construct(
        public string $id,
        public User $from,
        public string $invoicePayload,
        public ShippingAddress $shippingAddress,
    ) {
    }

    public static function buildFromArray(mixed $shipping_query)
    {
        return new self(
            $shipping_query['id'],
            User::buildFromArray($shipping_query['from']),
            $shipping_query['invoice_payload'],
            ShippingAddress::buildFromArray($shipping_query['shipping_address']),
        );
    }
}
