<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class PreCheckoutQuery
{
    public function __construct(
        public string $id,
        public User $from,
        public string $currency,
        public int $totalAmount,
        public string $invoicePayload,
        public ?string $shippingOptionId,
        public ?OrderInfo $orderInfo,
    ) {
    }

    public static function buildFromArray(mixed $pre_checkout_query)
    {
        return new self(
            $pre_checkout_query['id'],
            User::buildFromArray($pre_checkout_query['from']),
            $pre_checkout_query['currency'],
            $pre_checkout_query['total_amount'],
            $pre_checkout_query['invoice_payload'],
            $pre_checkout_query['shipping_option_id'] ?? null,
            isset($pre_checkout_query['order_info']) ? OrderInfo::buildFromArray($pre_checkout_query['order_info']) : null,
        );
    }
}
