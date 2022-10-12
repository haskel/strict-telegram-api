<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

enum PollType: string
{
    case regular = 'regular';
    case quiz = 'quiz';
}
