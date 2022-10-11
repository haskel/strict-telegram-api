<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class WebAppData
{
    public function __construct(
        public string $data,
        public string $buttonText,
    ) {
    }

    public static function buildFromArray(mixed $web_app_data)
    {
        return new self(
            $web_app_data['data'],
            $web_app_data['button_text'],
        );
    }
}
