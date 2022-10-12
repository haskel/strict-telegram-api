<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class ChosenInlineResult
{
    public function __construct(
        public readonly string $resultId,
        public readonly User $from,
        public readonly ?Location $location,
        public readonly string $inlineMessageId,
        public readonly string $query,
    ) {
    }

    public static function buildFromArray(mixed $chosen_inline_result)
    {
        return new self(
            $chosen_inline_result['result_id'],
            User::buildFromArray($chosen_inline_result['from']),
            isset($chosen_inline_result['location']) ? Location::buildFromArray($chosen_inline_result['location']) : null,
            $chosen_inline_result['inline_message_id'],
            $chosen_inline_result['query'],
        );
    }
}
