<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type\InlineQueryResult;

class InlineQueryResultGif
{

    public function __construct(
        string $id,
        string $gifUrl,
        string $thumbUrl,
        ?string $title,
        ?string $caption,
        ?string $replyMarkup,
        ?string $inputMessageContent
    ) {
    }
}
