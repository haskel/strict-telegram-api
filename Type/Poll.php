<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class Poll
{
    public function __construct(
        public string $id,
        public string $question,
        public array $options,
        public int $totalVoterCount,
        public bool $isClosed,
        public bool $isAnonymous,
        public string $type,
        public bool $allowsMultipleAnswers,
        public int $correctOptionId,
        public string $explanation,
        public ?MessageEntity $explanationEntities,
        public int $openPeriod,
        public int $closeDate,
    ) {
    }

    public static function buildFromArray(mixed $poll)
    {
        return new self(
            $poll['id'],
            $poll['question'],
            $poll['options'],
            $poll['total_voter_count'],
            $poll['is_closed'],
            $poll['is_anonymous'],
            $poll['type'],
            $poll['allows_multiple_answers'],
            $poll['correct_option_id'],
            $poll['explanation'],
            isset($poll['explanation_entities']) ? MessageEntity::buildFromArray($poll['explanation_entities']) : null,
            $poll['open_period'],
            $poll['close_date'],
        );
    }
}
