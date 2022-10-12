<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class PollAnswer
{
    public function __construct(
        public string $pollId,
        public User $user,
        public array $optionIds,
    ) {
    }

    public static function buildFromArray(mixed $poll_answer)
    {
        return new self(
            $poll_answer['poll_id'],
            User::buildFromArray($poll_answer['user']),
            $poll_answer['option_ids'],
        );
    }
}
