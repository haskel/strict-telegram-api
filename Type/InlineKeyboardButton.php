<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class InlineKeyboardButton
{
    public function __construct(
        public string $text,
        public ?string $url = null,
        public ?string $callbackData = null,
        public ?WebAppInfo $webApp = null,
        public ?LoginUrl $loginUrl = null,
        public ?string $switchInlineQuery = null,
        public ?string $switchInlineQueryCurrentChat = null,
        public ?CallbackGame $callbackGame = null,
        public ?bool $pay = null,
    ) {
    }

    public function toArray(): array
    {
        $return = [
            'text' => $this->text,
            'url' => $this->url,
            'callback_data' => $this->callbackData,
            'web_app' => $this->webApp?->toArray(),
            'login_url' => $this->loginUrl?->toArray(),
            'switch_inline_query' => $this->switchInlineQuery,
            'switch_inline_query_current_chat' => $this->switchInlineQueryCurrentChat,
            'callback_game' => $this->callbackGame?->toArray(),
            'pay' => $this->pay,
        ];

        $options = $return;
        unset($options['text']);
        $hasOption = count(
            array_filter(
                $options,
                fn($value) => $value !== null && $value !== ''
            )
        );

        if (!$hasOption) {
            $return['callback_data'] = $this->text;
        }

        return $return;
    }

    public static function buildFromArray(mixed $button)
    {
        return new self(
            $button['text'],
            $button['url'] ?? null,
            $button['callback_data'] ?? null,
            isset($button['web_app']) ? WebAppInfo::buildFromArray($button['web_app']) : null,
            isset($button['login_url']) ? LoginUrl::buildFromArray($button['login_url']) : null,
            $button['switch_inline_query'] ?? null,
            $button['switch_inline_query_current_chat'] ?? null,
            isset($button['callback_game']) ? CallbackGame::buildFromArray($button['callback_game']) : null,
            $button['pay'] ?? null,
        );
    }
}
