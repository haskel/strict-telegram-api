<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type\InlineQueryResult;

class InlineQueryResultVideo
{

    public function __construct(
        string $id,
        string $videoUrl,
        string $mime,
        string $thumbUrl,
        ?string $title,
        ?string $caption,
        ?string $replyMarkup,
        ?string $inputMessageContent
    ) {
    }
}
