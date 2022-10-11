<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class SuccessfulPayment
{
    public function __construct(
        public string $currency,
        public int $totalAmount,
        public string $invoicePayload,
        public ?string $shippingOptionId,
        public ?OrderInfo $orderInfo,
        public string $telegramPaymentChargeId,
        public string $providerPaymentChargeId,
    ) {
    }

    public static function buildFromArray(mixed $successful_payment)
    {
        return new self(
            $successful_payment['currency'],
            $successful_payment['total_amount'],
            $successful_payment['invoice_payload'],
            $successful_payment['shipping_option_id'] ?? null,
            isset($successful_payment['order_info']) ? OrderInfo::buildFromArray($successful_payment['order_info']) : null,
            $successful_payment['telegram_payment_charge_id'],
            $successful_payment['provider_payment_charge_id'],
        );
    }
}
