<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type\Update;

use Haskel\Telegram\Type\CallbackQuery;
use Haskel\Telegram\Type\ChatJoinRequest;
use Haskel\Telegram\Type\ChatMember;
use Haskel\Telegram\Type\InlineQuery;
use Haskel\Telegram\Type\InlineQueryResult\ChosenInlineResult;
use Haskel\Telegram\Type\Message;
use Haskel\Telegram\Type\MyChatMember;
use Haskel\Telegram\Type\Poll;
use Haskel\Telegram\Type\PollAnswer;
use Haskel\Telegram\Type\PreCheckoutQuery;
use Haskel\Telegram\Type\ShippingQuery;

/**
 * @property-read int $updateId,
 * @property-read ?Message $message
 * @property-read ?Message $editedMessage
 * @property-read ?Message $channelPost
 * @property-read ?Message $editedChannelPost
 * @property-read ?InlineQuery $inlineQuery
 * @property-read ?ChosenInlineResult $chosenInlineResult
 * @property-read ?CallbackQuery $callbackQuery
 * @property-read ?ShippingQuery $shippingQuery
 * @property-read ?PreCheckoutQuery $preCheckoutQuery
 * @property-read ?Poll $poll
 * @property-read ?PollAnswer $pollAnswer
 * @property-read ?MyChatMember $myChatMember
 * @property-read ?ChatMember $chatMember
 * @property-read ?ChatJoinRequest $chatJoinRequest
 */
interface Update
{
    public function hasSingleCommand(): bool;

    public function hasSeveralCommands(): bool;

    public function getCommand(): ?string;
}
