<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class CallbackQuery
{
    public function __construct(
        public readonly string $id,
        public readonly User $from,
        public readonly ?Message $message,
        public readonly ?string $inlineMessageId,
        public readonly string $chatInstance,
        public readonly ?string $data,
        public readonly ?string $gameShortName,
    ) {
    }

    public static function buildFromArray(mixed $callback_query)
    {
        return new self(
            $callback_query['id'],
            User::buildFromArray($callback_query['from']),
            isset($callback_query['message']) ? Message::buildFromArray($callback_query['message']) : null,
            $callback_query['inline_message_id'] ?? null,
            $callback_query['chat_instance'],
            $callback_query['data'] ?? null,
            $callback_query['game_short_name'] ?? null,
        );
    }
}
