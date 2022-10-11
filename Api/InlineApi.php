<?php

declare(strict_types=1);

namespace Haskel\Telegram\Api;

use Haskel\Telegram\Type\InlineQueryResult;
use Haskel\Telegram\Type\SentWebAppMessage;

class InlineApi
{
    public function answerInlineQuery(
        string $inlineQueryId,
        array $results,
        ?int $cacheTime = null,
        ?bool $isPersonal = null,
        ?string $nextOffset = null,
        ?string $switchPmText = null,
        ?string $switchPmParameter = null
    ): array
    {
        return [];
    }

    public function answerWebAppQuery(
        string $webAppQueryId,
        InlineQueryResult $result,
    ): SentWebAppMessage
    {
        return [];
    }
}
