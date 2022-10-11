<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type\Update;

use App\Telegram\Type\CallbackQuery;
use App\Telegram\Type\ChatJoinRequest;
use App\Telegram\Type\ChatMember;
use App\Telegram\Type\ChosenInlineResult;
use App\Telegram\Type\InlineQuery;
use App\Telegram\Type\Message;
use App\Telegram\Type\MyChatMember;
use App\Telegram\Type\Poll;
use App\Telegram\Type\PollAnswer;
use App\Telegram\Type\PreCheckoutQuery;
use App\Telegram\Type\ShippingQuery;

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
