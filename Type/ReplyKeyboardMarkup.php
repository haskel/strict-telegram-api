<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class ReplyKeyboardMarkup implements KeyboardMarkup
{
    public function __construct(
        public array $keyboard,
        public ?bool $resizeKeyboard = null,
        public ?bool $oneTimeKeyboard = null,
        public ?string $inputFieldPlaceholder = null,
        public ?bool $selective = null,
    ) {
    }

    public function toArray(): array
    {
        $keyboard = [];
        foreach ($this->keyboard as $row) {
            $keyboardRow = [];
            /** @var \Haskel\Telegram\Type\KeyboardButton $button */
            foreach ($row as $button) {
                $keyboardRow[] = $button->toArray();
            }
            $keyboard[] = $keyboardRow;
        }

        return [
            'keyboard' => $keyboard,
            'resize_keyboard' => $this->resizeKeyboard,
            'one_time_keyboard' => $this->oneTimeKeyboard,
            'input_field_placeholder' => $this->inputFieldPlaceholder,
            'selective' => $this->selective,
        ];
    }
}
