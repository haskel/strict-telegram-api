<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class ProximityAlertTriggered
{
    public function __construct(
        public User $traveler,
        public User $watcher,
        public int $distance
    ) {
    }

    public static function buildFromArray(mixed $proximity_alert_triggered)
    {
        return new self(
            User::buildFromArray($proximity_alert_triggered['traveler']),
            User::buildFromArray($proximity_alert_triggered['watcher']),
            $proximity_alert_triggered['distance']
        );
    }
}
