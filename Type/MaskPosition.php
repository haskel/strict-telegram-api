<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class MaskPosition
{
    public function __construct(
        private string $point,
        private float $xShift,
        private float $yShift,
        private float $scale,
    ) {
    }

    public static function buildFromArray(mixed $maskPosition): self
    {
        return new self(
            point: $maskPosition['point'],
            xShift: $maskPosition['x_shift'],
            yShift: $maskPosition['y_shift'],
            scale: $maskPosition['scale'],
        );
    }
}
