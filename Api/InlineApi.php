<?php

declare(strict_types=1);

namespace Haskel\Telegram\Api;

use Haskel\Telegram\Type\InlineQueryResult;
use Haskel\Telegram\Type\SentWebAppMessage;

class InlineApi
{
    public function __construct(
        private TelegramRequestCaller $caller,
    ) {
    }

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
        $requestResults = [];
        foreach ($results as $result) {
            if (!$result instanceof InlineQueryResult) {
                throw new \InvalidArgumentException('Result must be instance of InlineQueryResult');
            }

            $requestResults[] = $result->toArray();
        }

        $response =  $this->caller->call(
            'answerInlineQuery',
            [
                'inline_query_id' => $inlineQueryId,
                'results' => $requestResults,
                'cache_time' => $cacheTime,
                'is_personal' => $isPersonal,
                'next_offset' => $nextOffset,
                'switch_pm_text' => $switchPmText,
                'switch_pm_parameter' => $switchPmParameter,
            ]
        );

        return $response;
    }

    public function answerWebAppQuery(
        string $webAppQueryId,
        InlineQueryResult $result,
    ): SentWebAppMessage
    {
        return [];
    }
}
