<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

enum ParseMode: string
{
    case Markdown = 'Markdown';
    case MarkdownV2 = 'MarkdownV2';
    case HTML = 'HTML';
}
