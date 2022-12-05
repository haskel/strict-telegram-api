<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type\InlineQueryResult;

class InlineQueryResultPhoto
{

    public function __construct(
        string $id,
        string $photoUrl,
        string $thumbUrl,
        ?string $title,
        ?string $description,
        ?string $caption,
        ?string $replyMarkup,
        ?string $inputMessageContent
    ) {
    }
}
