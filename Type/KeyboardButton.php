<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class KeyboardButton
{
    public function __construct(
        public string $text,
        public ?bool $requestContact = null,
        public ?bool $requestLocation = null,
        public ?KeyboardButtonPollType $requestPoll = null,
        public ?WebAppInfo $webApp = null,
    ) {
    }

    public function toArray()
    {
        return [
            'text' => $this->text,
            'request_contact' => $this->requestContact,
            'request_location' => $this->requestLocation,
            'request_poll' => $this->requestPoll?->toArray(),
            'web_app' => $this->webApp?->toArray(),
        ];
    }
}
