<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class CallbackGame
{
    public function __construct(
        public readonly int $userId,
        public readonly int $score,
        public readonly ?bool $force = null,
        public readonly ?bool $disableEditMessage = null,
        public readonly ?int $chatId = null,
        public readonly ?int $messageId = null,
        public readonly ?string $inlineMessageId = null,
    ) {
    }

    public static function buildFromArray(mixed $callbackGame): self
    {
        return new self(
            $callbackGame['user_id'],
            $callbackGame['score'],
            $callbackGame['force'] ?? null,
            $callbackGame['disable_edit_message'] ?? null,
            $callbackGame['chat_id'] ?? null,
            $callbackGame['message_id'] ?? null,
            $callbackGame['inline_message_id'] ?? null,
        );
    }

    public function toArray()
    {
        return [
            'user_id' => $this->userId,
            'score' => $this->score,
            'force' => $this->force,
            'disable_edit_message' => $this->disableEditMessage,
            'chat_id' => $this->chatId,
            'message_id' => $this->messageId,
            'inline_message_id' => $this->inlineMessageId,
        ];
    }
}
