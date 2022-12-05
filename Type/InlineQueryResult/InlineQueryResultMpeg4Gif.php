<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type\InlineQueryResult;

class InlineQueryResultMpeg4Gif
{

    public function __construct(
        string $id,
        string $mpeg4Url,
        string $thumbUrl,
        ?string $title,
        ?string $caption,
        ?string $replyMarkup,
        ?string $inputMessageContent
    ) {
    }
}
