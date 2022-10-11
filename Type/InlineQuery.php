<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class InlineQuery
{
    public function __construct(
        public readonly string $id,
        public readonly User $from,
        public readonly ?Location $location,
        public readonly string $query,
        public readonly string $offset,
    ) {
    }

    public static function buildFromArray(mixed $inline_query)
    {
        return new self(
            $inline_query['id'],
            User::buildFromArray($inline_query['from']),
            isset($inline_query['location']) ? Location::buildFromArray($inline_query['location']) : null,
            $inline_query['query'],
            $inline_query['offset'],
        );
    }
}
