<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

enum StickerType: string
{
    case Regular = 'regular';
    case Mask = 'mask';
}
