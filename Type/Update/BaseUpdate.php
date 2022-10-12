<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type\Update;

use Haskel\Telegram\Type\CallbackQuery;
use Haskel\Telegram\Type\ChannelPost;
use Haskel\Telegram\Type\ChatJoinRequest;
use Haskel\Telegram\Type\ChatMember;
use Haskel\Telegram\Type\ChosenInlineResult;
use Haskel\Telegram\Type\EditedChannelPost;
use Haskel\Telegram\Type\EditedMessage;
use Haskel\Telegram\Type\InlineQuery;
use Haskel\Telegram\Type\Message;
use Haskel\Telegram\Type\MyChatMember;
use Haskel\Telegram\Type\Poll;
use Haskel\Telegram\Type\PollAnswer;
use Haskel\Telegram\Type\PreCheckoutQuery;
use Haskel\Telegram\Type\ShippingQuery;

abstract class BaseUpdate implements Update
{
    public function __construct(
        public readonly int $updateId,
        public readonly ?Message $message,
        public readonly ?EditedMessage $editedMessage,
        public readonly ?ChannelPost $channelPost,
        public readonly ?EditedChannelPost $editedChannelPost,
        public readonly ?InlineQuery $inlineQuery,
        public readonly ?ChosenInlineResult $chosenInlineResult,
        public readonly ?CallbackQuery $callbackQuery,
        public readonly ?ShippingQuery $shippingQuery,
        public readonly ?PreCheckoutQuery $preCheckoutQuery,
        public readonly ?Poll $poll,
        public readonly ?PollAnswer $pollAnswer,
        public readonly ?MyChatMember $myChatMember,
        public readonly ?ChatMember $chatMember,
        public readonly ?ChatJoinRequest $chatJoinRequest,
    ) {
    }

    public static function buildFromArray(array $array)
    {
        return new static(
            updateId: $array['update_id'],
            message: isset($array['message']) ? Message::buildFromArray($array['message']) : null,
            editedMessage: isset($array['edited_message']) ? EditedMessage::buildFromArray($array['edited_message']) : null,
            channelPost: isset($array['channel_post']) ? ChannelPost::buildFromArray($array['channel_post']) : null,
            editedChannelPost: isset($array['edited_channel_post']) ? EditedChannelPost::buildFromArray($array['edited_channel_post']) : null,
            inlineQuery: isset($array['inline_query']) ? InlineQuery::buildFromArray($array['inline_query']) : null,
            chosenInlineResult: isset($array['chosen_inline_result']) ? ChosenInlineResult::buildFromArray($array['chosen_inline_result']) : null,
            callbackQuery: isset($array['callback_query']) ? CallbackQuery::buildFromArray($array['callback_query']) : null,
            shippingQuery: isset($array['shipping_query']) ? ShippingQuery::buildFromArray($array['shipping_query']) : null,
            preCheckoutQuery: isset($array['pre_checkout_query']) ? PreCheckoutQuery::buildFromArray($array['pre_checkout_query']) : null,
            poll: isset($array['poll']) ? Poll::buildFromArray($array['poll']) : null,
            pollAnswer: isset($array['poll_answer']) ? PollAnswer::buildFromArray($array['poll_answer']) : null,
            myChatMember: isset($array['my_chat_member']) ? MyChatMember::buildFromArray($array['my_chat_member']) : null,
            chatMember: isset($array['chat_member']) ? ChatMember::buildFromArray($array['chat_member']) : null,
            chatJoinRequest: isset($array['chat_join_request']) ? ChatJoinRequest::buildFromArray($array['chat_join_request']) : null,
        );
    }

    public function hasSingleCommand(): bool
    {
        return $this->message?->getCommand() !== null;
    }

    public function hasSeveralCommands(): bool
    {
        return false;
    }

    public function getCommand(): ?string
    {
        return $this->message?->getCommand();
    }


}
