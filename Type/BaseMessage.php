<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

use DateTime;

/**
 * @property MessageEntity[] $entities
 */
abstract class BaseMessage
{
    public function __construct(
        public int $messageId,
        public readonly ?User $from = null,
        public readonly ?Chat $senderChat = null,
        public readonly ?int $date = null,
        public readonly ?Chat $chat = null,
        public readonly ?User $forwardFrom = null,
        public readonly ?Chat $forwardFromChat = null,
        public readonly ?int $forwardFromMessageId = null,
        public readonly ?string $forwardSignature = null,
        public readonly ?string $forwardSenderName = null,
        public readonly ?int $forwardDate = null,
        public readonly ?bool $isAutomaticForward = null,
        public readonly ?Message $replyToMessage = null,
        public readonly ?User $viaBot = null,
        public readonly ?int $editDate = null,
        public readonly ?bool $hasProtectedContent = null,
        public readonly ?string $mediaGroupId = null,
        public readonly ?string $authorSignature = null,
        public readonly ?string $text = null,
        public readonly ?array $entities = null, /** MessageEntity[] */
        public readonly ?Animation $animation = null,
        public readonly ?Audio $audio = null,
        public readonly ?Document $document = null,
        public readonly ?array $photo = null, /** PhotoSize[] */
        public readonly ?Sticker $sticker = null,
        public readonly ?Video $video = null,
        public readonly ?VideoNote $videoNote = null,
        public readonly ?Voice $voice = null,
        public readonly ?string $caption = null,
        public readonly ?array $captionEntities = null, /** MessageEntity[] */
        public readonly ?Contact $contact = null,
        public readonly ?Dice $dice = null,
        public readonly ?Game $game = null,
        public readonly ?Poll $poll = null,
        public readonly ?Venue $venue = null,
        public readonly ?Location $location = null,
        public readonly ?array $newChatMembers = null, /** User[] */
        public readonly ?User $leftChatMember = null,
        public readonly ?string $newChatTitle = null,
        public readonly ?array $newChatPhoto = null, /** PhotoSize[] */
        public readonly ?bool $deleteChatPhoto = null,
        public readonly ?bool $groupChatCreated = null,
        public readonly ?bool $supergroupChatCreated = null,
        public readonly ?bool $channelChatCreated = null,
        public readonly ?MessageAutoDeleteTimerChanged $messageAutoDeleteTimerChanged = null,
        public readonly ?int $migrateToChatId = null,
        public readonly ?int $migrateFromChatId = null,
        public readonly ?Message $pinnedMessage = null,
        public readonly ?Invoice $invoice = null,
        public readonly ?SuccessfulPayment $successfulPayment = null,
        public readonly ?string $connectedWebsite = null,
        public readonly ?PassportData $passportData = null,
        public readonly ?ProximityAlertTriggered $proximityAlertTriggered = null,
        public readonly ?VideoChatScheduled $videoChatScheduled = null,
        public readonly ?VideoChatStarted $videoChatStarted = null,
        public readonly ?VideoChatEnded $videoChatEnded = null,
        public readonly ?VideoChatParticipantsInvited $videoChatParticipantsInvited = null,
        public readonly ?WebAppData $webAppData = null,
        public readonly ?InlineKeyboardMarkup $replyMarkup = null,
    ) {
    }

    public function getCommand(): ?string
    {
        if (empty($this->entities)) {
            return null;
        }

        foreach ($this->entities as $entity) {
            if ($entity->type === MessageEntityType::BotCommand) {
                return substr($this->text, $entity->offset, $entity->length);
            }
        }

        return null;
    }

    public static function buildFromArray(array $message)
    {
        return new static(
            $message['message_id'],
            isset($message['from']) ? User::buildFromArray($message['from']) : null,
            isset($message['sender_chat']) ? Chat::buildFromArray($message['sender_chat']) : null,
            $message['date'] ?? null,
            Chat::buildFromArray($message['chat']),
            isset($message['forward_from']) ? User::buildFromArray($message['forward_from']) : null,
            isset($message['forward_from_chat']) ? Chat::buildFromArray($message['forward_from_chat']) : null,
            $message['forward_from_message_id'] ?? null,
            $message['forward_signature'] ?? null,
            $message['forward_sender_name'] ?? null,
            $message['forward_date'] ?? null,
            $message['is_automatic_forward'] ?? null,
            isset($message['reply_to_message']) ? self::buildFromArray($message['reply_to_message']) : null,
            isset($message['via_bot']) ? User::buildFromArray($message['via_bot']) : null,
            $message['edit_date'] ?? null,
            $message['has_protected_content'] ?? null,
            $message['media_group_id'] ?? null,
            $message['author_signature'] ?? null,
            $message['text'] ?? null,
            isset($message['entities']) ? array_map(fn ($entity) => MessageEntity::buildFromArray($entity), $message['entities']) : null,
            isset($message['animation']) ? Animation::buildFromArray($message['animation']) : null,
            isset($message['audio']) ? Audio::buildFromArray($message['audio']) : null,
            isset($message['document']) ? Document::buildFromArray($message['document']) : null,
            isset($message['photo']) ? array_map(fn ($photo) => PhotoSize::buildFromArray($photo), $message['photo']) : null,
            isset($message['sticker']) ? Sticker::buildFromArray($message['sticker']) : null,
            isset($message['video']) ? Video::buildFromArray($message['video']) : null,
            isset($message['video_note']) ? VideoNote::buildFromArray($message['video_note']) : null,
            isset($message['voice']) ? Voice::buildFromArray($message['voice']) : null,
            $message['caption'] ?? null,
            isset($message['caption_entities']) ? array_map(fn ($entity) => MessageEntity::buildFromArray($entity), $message['caption_entities']) : null,
            isset($message['contact']) ? Contact::buildFromArray($message['contact']) : null,
            isset($message['dice']) ? Dice::buildFromArray($message['dice']) : null,
            isset($message['game']) ? Game::buildFromArray($message['game']) : null,
            isset($message['poll']) ? Poll::buildFromArray($message['poll']) : null,
            isset($message['venue']) ? Venue::buildFromArray($message['venue']) : null,
            isset($message['location']) ? Location::buildFromArray($message['location']) : null,
            isset($message['new_chat_members']) ? array_map(fn ($member) => User::buildFromArray($member), $message['new_chat_members']) : null,
            isset($message['left_chat_member']) ? User::buildFromArray($message['left_chat_member']) : null,
            $message['new_chat_title'] ?? null,
            isset($message['new_chat_photo']) ? array_map(fn ($photo) => PhotoSize::buildFromArray($photo), $message['new_chat_photo']) : null,
            $message['delete_chat_photo'] ?? null,
            $message['group_chat_created'] ?? null,
            $message['supergroup_chat_created'] ?? null,
            $message['channel_chat_created'] ?? null,
            isset($message['message_auto_delete_timer_changed']) ? MessageAutoDeleteTimerChanged::buildFromArray($message['message_auto_delete_timer_changed']) : null,
            $message['migrate_to_chat_id'] ?? null,
            $message['migrate_from_chat_id'] ?? null,
            isset($message['pinned_message']) ? self::buildFromArray($message['pinned_message']) : null,
            isset($message['invoice']) ? Invoice::buildFromArray($message['invoice']) : null,
            isset($message['successful_payment']) ? SuccessfulPayment::buildFromArray($message['successful_payment']) : null,
            $message['connected_website'] ?? null,
            isset($message['passport_data']) ? PassportData::buildFromArray($message['passport_data']) : null,
            isset($message['proximity_alert_triggered']) ? ProximityAlertTriggered::buildFromArray($message['proximity_alert_triggered']) : null,
            isset($message['video_chat_scheduled']) ? VideoChatScheduled::buildFromArray($message['video_chat_scheduled']) : null,
            isset($message['video_chat_started']) ? VideoChatStarted::buildFromArray($message['video_chat_started']) : null,
            isset($message['video_chat_ended']) ? VideoChatEnded::buildFromArray($message['video_chat_ended']) : null,
            isset($message['video_chat_participants_invited']) ? VideoChatParticipantsInvited::buildFromArray($message['video_chat_participants_invited']) : null,
            isset($message['web_app_data']) ? WebAppData::buildFromArray($message['web_app_data']) : null,
            isset($message['reply_markup']) ? InlineKeyboardMarkup::buildFromArray($message['reply_markup']) : null
        );
    }
}
