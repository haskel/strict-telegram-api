<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class InlineKeyboardMarkup implements KeyboardMarkup
{
    public function __construct(
        /** @var $inlineKeyboard InlineKeyboardButton[] */
        public array $inlineKeyboard,
    ) {
    }

    public function toArray(): array
    {
        return [
            'inline_keyboard' => array_map(function (array $inlineKeyboardButton) {
                return array_map(function (InlineKeyboardButton $inlineKeyboardButton) {
                    return $inlineKeyboardButton->toArray();
                }, $inlineKeyboardButton);
            }, $this->inlineKeyboard),
        ];
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
