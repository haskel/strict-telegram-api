<?php

declare(strict_types=1);

namespace Haskel\Telegram\Api\Helper;

class MarkdownV2
{
    private static array $escapeChars = ['_', '*', '[', ']', '(', ')', '~', '`', '>', '#', '+', '-', '=', '|', '{', '}', '.', '!'];

    public static function escape(string $text): string
    {
        $replacements = array_map(fn ($char) => '\\' . $char, self::$escapeChars);
        return str_replace(self::$escapeChars, $replacements, $text);
    }
}
