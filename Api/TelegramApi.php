<?php

declare(strict_types=1);

namespace Haskel\Telegram\Api;

class TelegramApi
{
    public function __construct(
        public readonly string $botName,
        public readonly BotApi $botApi,
        public readonly ChatManagementApi $chatManagementApi,
        public readonly MessageApi $messageApi,
        public readonly StickerApi $stickerApi,
        public readonly GameApi $gameApi,
        public readonly InlineApi $inlineApi,
        public readonly PaymentApi $paymentApi,
        public readonly PassportApi $passportApi,
        ?string $url = null,
    ) {
        $this->bot = $botApi;
        $this->chatManagement = $chatManagementApi;
        $this->message = $messageApi;
        $this->sticker = $stickerApi;
        $this->game = $gameApi;
        $this->inline = $inlineApi;
        $this->payment = $paymentApi;
        $this->passport = $passportApi;
    }
}
