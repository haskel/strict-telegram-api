<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type\InlineQueryResult;

use Haskel\Telegram\Type\InlineQueryResult;

class InlineQueryResultArticle implements InlineQueryResult
{
    public readonly string $type;

    public function __construct(
        public string $id,
        public string $title,
        public InputMessageContent $inputMessageContent,
        public ?string $url = null,
        public ?bool $hideUrl = null,
        public ?string $description = null,
        public ?string $thumbUrl = null,
        public ?int $thumbWidth = null,
        public ?int $thumbHeight = null
    ) {
        $this->type = 'article';
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'id' => $this->id,
            'title' => $this->title,
            'input_message_content' => $this->inputMessageContent->toArray(),
            'url' => $this->url,
            'hide_url' => $this->hideUrl,
            'description' => $this->description,
            'thumb_url' => $this->thumbUrl,
            'thumb_width' => $this->thumbWidth,
            'thumb_height' => $this->thumbHeight,
        ];
    }
}
