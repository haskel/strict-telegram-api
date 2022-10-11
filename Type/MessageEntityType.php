<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

enum MessageEntityType: string
{
    case Mention = 'mention';
    case Hashtag = 'hashtag';
    case Cashtag = 'cashtag';
    case BotCommand = 'bot_command';
    case Url = 'url';
    case Email = 'email';
    case PhoneNumber = 'phone_number';
    case Bold = 'bold';
    case Italic = 'italic';
    case Underline = 'underline';
    case Strikethrough = 'strikethrough';
    case Code = 'code';
    case Pre = 'pre';
    case TextLink = 'text_link';
    case TextMention = 'text_mention';
}
