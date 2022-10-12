<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class InlineKeyboardMarkup
{
    public function __construct(
        /** @var $inlineKeyboard InlineKeyboardButton[] */
        public array $inlineKeyboard,
    ) {
    }
    public static function buildFromArray(mixed $reply_markup)
    {
        $inlineKeyboard = [];
        foreach ($reply_markup['inline_keyboard'] as $row) {
            $inlineKeyboardRow = [];
            foreach ($row as $button) {
                $inlineKeyboardRow[] = InlineKeyboardButton::buildFromArray($button);
            }
            $inlineKeyboard[] = $inlineKeyboardRow;
        }
        return new self(
            $inlineKeyboard,
        );
    }
}
