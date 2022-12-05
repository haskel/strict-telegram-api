<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type\InlineQueryResult;

use Haskel\Telegram\Type\ParseMode;

class InputTextMessageContent implements InputMessageContent
{
    public function __construct(
        public string $messageText,
        public ?ParseMode $parseMode = null,
        public ?bool $disableWebPagePreview = null,
    ) {
    }

    public function toArray()
    {
        return [
            'message_text' => $this->messageText,
            'parse_mode' => $this->parseMode?->value,
            'disable_web_page_preview' => $this->disableWebPagePreview,
        ];
    }
}
