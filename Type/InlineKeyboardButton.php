<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class InlineKeyboardButton
{
    public function __construct(
        public string $text,
        public string $url,
        public string $callbackData,
        public WebAppInfo $webApp,
        public LoginUrl $loginUrl,
        public string $switchInlineQuery,
        public string $switchInlineQueryCurrentChat,
        public CallbackGame $callbackGame,
        public bool $pay,
    ) {
    }

    public static function buildFromArray(mixed $button)
    {
        return new self(
            $button['text'],
            $button['url'],
            $button['callback_data'],
            WebAppInfo::buildFromArray($button['web_app']),
            LoginUrl::buildFromArray($button['login_url']),
            $button['switch_inline_query'],
            $button['switch_inline_query_current_chat'],
            CallbackGame::buildFromArray($button['callback_game']),
            $button['pay'],
        );
    }
}
