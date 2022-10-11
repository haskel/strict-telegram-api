<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class Invoice
{
    public function __construct(
        public string $title,
        public string $description,
        public string $startParameter,
        public string $currency,
        public int $totalAmount,
    ) {
    }

    public static function buildFromArray(mixed $invoice)
    {
        return new self(
            $invoice['title'],
            $invoice['description'],
            $invoice['start_parameter'],
            $invoice['currency'],
            $invoice['total_amount'],
        );
    }
}
