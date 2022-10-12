<?php

declare(strict_types=1);

namespace Haskel\Telegram\Api;

use App\Constant\HappyCustomerBot;
use Haskel\Telegram\Api\Helper\MarkdownV2;
use Haskel\Telegram\Type\ChatAction;
use Haskel\Telegram\Type\DiceEmoji;
use Haskel\Telegram\Type\InputFile;
use Haskel\Telegram\Type\InputMedia;
use Haskel\Telegram\Type\KeyboardMarkup;
use Haskel\Telegram\Type\ParseMode;
use Haskel\Telegram\Type\PollType;
use Haskel\Telegram\Type\UserProfilePhotos;

class MessageApi
{
    private const SPLIT_LENGTH = 4096;

    public function __construct(
        private TelegramRequestCaller $caller,
    ) {
    }

    public function sendMessage(
        string $chatId,
        string $text,
        ParseMode $parseMode = ParseMode::MarkdownV2,
        ?array $entities = [],
        ?bool $disableWebPagePreview = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
        ?bool $allowSendingWithoutReply = null,
        KeyboardMarkup $replyMarkup = null,
    ) {
        $text = match ($parseMode) {
            ParseMode::MarkdownV2 => MarkdownV2::escape($text),
            default => $text,
        };

        $request = [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => $parseMode->value,
            'entities' => $entities,
            'disable_web_page_preview' => $disableWebPagePreview,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'reply_to_message_id' => $replyToMessageId,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
            'reply_markup' => $replyMarkup,
        ];

        $encoding = mb_internal_encoding();
        $responses = [];
        do {
            $request['text'] = mb_substr($text, 0, self::SPLIT_LENGTH, $encoding);
            $responses[]  = $this->caller->call('sendMessage', $request);

            $text = mb_substr($text, self::SPLIT_LENGTH, null, $encoding);
        } while ($text !== '');

//        return end($responses);
    }

    public function forwardMessage(
        int|string $chatId,
        string $fromChatId,
        int $messageId,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
    ): array {
        return $this->caller->call(
            'forwardMessage',
                [
                'chat_id' => $chatId,
                'from_chat_id' => $fromChatId,
                'message_id' => $messageId,
                'disable_notification' => $disableNotification,
                'protect_content' => $protectContent,
            ]
        );
    }

    public function copyMessage(
        int|string $chatId,
        int|string $fromChatId,
        int $messageId,
        ?string $caption = null,
        ?ParseMode $parseMode = null,
        ?array $captionEntities = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
        ?bool $allowSendingWithoutReply = null,
        KeyboardMarkup $replyMarkup = null,
    ): array {
        return $this->caller->call(
            'copyMessage',
            [
                'chat_id' => $chatId,
                'from_chat_id' => $fromChatId,
                'message_id' => $messageId,
                'caption' => $caption,
                'parse_mode' => $parseMode?->value,
                'caption_entities' => $captionEntities,
                'disable_notification' => $disableNotification,
                'protect_content' => $protectContent,
                'reply_to_message_id' => $replyToMessageId,
                'allow_sending_without_reply' => $allowSendingWithoutReply,
                'reply_markup' => $replyMarkup,
            ]
        );
    }

    public function sendPhoto(
        int|string $chatId,
        InputFile|string $photo,
        ?string $caption = null,
        ?ParseMode $parseMode = null,
        ?array $captionEntities = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
        ?bool $allowSendingWithoutReply = null,
        KeyboardMarkup $replyMarkup = null,
    ): array {
        return $this->caller->call(
            'sendPhoto',
            [
                'chat_id' => $chatId,
                'photo' => $photo,
                'caption' => $caption,
                'parse_mode' => $parseMode?->value,
                'caption_entities' => $captionEntities,
                'disable_notification' => $disableNotification,
                'protect_content' => $protectContent,
                'reply_to_message_id' => $replyToMessageId,
                'allow_sending_without_reply' => $allowSendingWithoutReply,
                'reply_markup' => $replyMarkup,
            ]
        );
    }

    public function sendAudio(
        int|string $chatId,
        InputFile|string $audio,
        ?string $caption = null,
        ?ParseMode $parseMode = null,
        ?array $captionEntities = null,
        ?int $duration = null,
        ?string $performer = null,
        ?string $title = null,
        InputFile|string $thumb = null,
        ?string $thumbUrl = null,
        ?int $thumbWidth = null,
        ?int $thumbHeight = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
        ?bool $allowSendingWithoutReply = null,
        KeyboardMarkup $replyMarkup = null,
    ): array {
        return $this->caller->call(
            'sendAudio',
            [
                'chat_id' => $chatId,
                'audio' => $audio,
                'caption' => $caption,
                'parse_mode' => $parseMode?->value,
                'caption_entities' => $captionEntities,
                'duration' => $duration,
                'performer' => $performer,
                'title' => $title,
                'thumb' => $thumb,
                'thumb_url' => $thumbUrl,
                'thumb_width' => $thumbWidth,
                'thumb_height' => $thumbHeight,
                'disable_notification' => $disableNotification,
                'protect_content' => $protectContent,
                'reply_to_message_id' => $replyToMessageId,
                'allow_sending_without_reply' => $allowSendingWithoutReply,
                'reply_markup' => $replyMarkup,
            ]
        );
    }

    public function sendDocument(
        int|string $chatId,
        InputFile|string $document,
        InputFile|string $thumb = null,
        ?string $thumbUrl = null,
        ?int $thumbWidth = null,
        ?int $thumbHeight = null,
        ?string $caption = null,
        ?ParseMode $parseMode = null,
        ?array $captionEntities = null,
        ?bool $disableContentTypeDetection = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
        ?bool $allowSendingWithoutReply = null,
        KeyboardMarkup $replyMarkup = null,
    ): array {
        return $this->caller->call(
            'sendDocument',
            [
                'chat_id' => $chatId,
                'document' => $document,
                'thumb' => $thumb,
                'thumb_url' => $thumbUrl,
                'thumb_width' => $thumbWidth,
                'thumb_height' => $thumbHeight,
                'caption' => $caption,
                'parse_mode' => $parseMode?->value,
                'caption_entities' => $captionEntities,
                'disable_content_type_detection' => $disableContentTypeDetection,
                'disable_notification' => $disableNotification,
                'protect_content' => $protectContent,
                'reply_to_message_id' => $replyToMessageId,
                'allow_sending_without_reply' => $allowSendingWithoutReply,
                'reply_markup' => $replyMarkup,
            ]
        );
    }

    public function sendVideo(
        int|string $chatId,
        InputFile|string $video,
        InputFile|string $thumb = null,
        ?string $thumbUrl = null,
        ?int $thumbWidth = null,
        ?int $thumbHeight = null,
        ?int $duration = null,
        ?int $width = null,
        ?int $height = null,
        ?string $caption = null,
        ?ParseMode $parseMode = null,
        ?array $captionEntities = null,
        ?bool $supportsStreaming = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
        ?bool $allowSendingWithoutReply = null,
        KeyboardMarkup $replyMarkup = null,
    ): array {
        return $this->caller->call(
            'sendVideo',
            [
                'chat_id' => $chatId,
                'video' => $video,
                'thumb' => $thumb,
                'thumb_url' => $thumbUrl,
                'thumb_width' => $thumbWidth,
                'thumb_height' => $thumbHeight,
                'duration' => $duration,
                'width' => $width,
                'height' => $height,
                'caption' => $caption,
                'parse_mode' => $parseMode?->value,
                'caption_entities' => $captionEntities,
                'supports_streaming' => $supportsStreaming,
                'disable_notification' => $disableNotification,
                'protect_content' => $protectContent,
                'reply_to_message_id' => $replyToMessageId,
                'allow_sending_without_reply' => $allowSendingWithoutReply,
                'reply_markup' => $replyMarkup,
            ]
        );
    }

    public function sendAnimation(
        int|string $chatId,
        InputFile|string $animation,
        InputFile|string $thumb = null,
        ?string $thumbUrl = null,
        ?int $thumbWidth = null,
        ?int $thumbHeight = null,
        ?int $duration = null,
        ?int $width = null,
        ?int $height = null,
        ?string $caption = null,
        ?ParseMode $parseMode = null,
        ?array $captionEntities = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
        ?bool $allowSendingWithoutReply = null,
        KeyboardMarkup $replyMarkup = null,
    ): array {
        return $this->caller->call(
            'sendAnimation',
            [
                'chat_id' => $chatId,
                'animation' => $animation,
                'thumb' => $thumb,
                'thumb_url' => $thumbUrl,
                'thumb_width' => $thumbWidth,
                'thumb_height' => $thumbHeight,
                'duration' => $duration,
                'width' => $width,
                'height' => $height,
                'caption' => $caption,
                'parse_mode' => $parseMode?->value,
                'caption_entities' => $captionEntities,
                'disable_notification' => $disableNotification,
                'protect_content' => $protectContent,
                'reply_to_message_id' => $replyToMessageId,
                'allow_sending_without_reply' => $allowSendingWithoutReply,
                'reply_markup' => $replyMarkup,
            ]
        );
    }

    public function sendVoice(
        int|string $chatId,
        InputFile|string $voice,
        ?string $caption = null,
        ?ParseMode $parseMode = null,
        ?array $captionEntities = null,
        ?int $duration = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
        ?bool $allowSendingWithoutReply = null,
        KeyboardMarkup $replyMarkup = null,
    ): array {
        return $this->caller->call(
            'sendVoice',
            [
                'chat_id' => $chatId,
                'voice' => $voice,
                'caption' => $caption,
                'parse_mode' => $parseMode?->value,
                'caption_entities' => $captionEntities,
                'duration' => $duration,
                'disable_notification' => $disableNotification,
                'protect_content' => $protectContent,
                'reply_to_message_id' => $replyToMessageId,
                'allow_sending_without_reply' => $allowSendingWithoutReply,
                'reply_markup' => $replyMarkup,
            ]
        );
    }

    public function sendVideoNote(
        int|string $chatId,
        InputFile|string $videoNote,
        InputFile|string $thumb = null,
        ?string $thumbUrl = null,
        ?int $thumbWidth = null,
        ?int $thumbHeight = null,
        ?int $duration = null,
        ?int $length = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
        ?bool $allowSendingWithoutReply = null,
        KeyboardMarkup $replyMarkup = null,
    ): array {
        return $this->caller->call(
            'sendVideoNote',
            [
                'chat_id' => $chatId,
                'video_note' => $videoNote,
                'thumb' => $thumb,
                'thumb_url' => $thumbUrl,
                'thumb_width' => $thumbWidth,
                'thumb_height' => $thumbHeight,
                'duration' => $duration,
                'length' => $length,
                'disable_notification' => $disableNotification,
                'protect_content' => $protectContent,
                'reply_to_message_id' => $replyToMessageId,
                'allow_sending_without_reply' => $allowSendingWithoutReply,
                'reply_markup' => $replyMarkup,
            ]
        );
    }

    public function sendMediaGroup(
        int|string $chatId,
        array $media,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
        ?bool $allowSendingWithoutReply = null,
    ): array {
        return $this->caller->call(
            'sendMediaGroup',
            [
                'chat_id' => $chatId,
                'media' => $media,
                'disable_notification' => $disableNotification,
                'reply_to_message_id' => $replyToMessageId,
                'allow_sending_without_reply' => $allowSendingWithoutReply,
                'protect_content' => $protectContent,
            ]
        );
    }

    public function sendLocation(
        int|string $chatId,
        float $latitude,
        float $longitude,
        ?int $horizontalAccuracy = null,
        ?int $livePeriod = null,
        ?int $heading = null,
        ?int $proximityAlertRadius = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
        ?bool $allowSendingWithoutReply = null,
        KeyboardMarkup $replyMarkup = null,
    ): array {
        return $this->caller->call(
            'sendLocation',
            [
                'chat_id' => $chatId,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'horizontal_accuracy' => $horizontalAccuracy,
                'live_period' => $livePeriod,
                'heading' => $heading,
                'proximity_alert_radius' => $proximityAlertRadius,
                'disable_notification' => $disableNotification,
                'protect_content' => $protectContent,
                'reply_to_message_id' => $replyToMessageId,
                'allow_sending_without_reply' => $allowSendingWithoutReply,
                'reply_markup' => $replyMarkup,
            ]
        );
    }

    public function sendSticker(
        int|string $chatId,
        InputFile|string $sticker,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
        ?bool $allowSendingWithoutReply = null,
        KeyboardMarkup $replyMarkup = null,
    ): array {
        return $this->caller->call(
            'sendSticker',
            [
                'chat_id' => $chatId,
                'sticker' => $sticker,
                'disable_notification' => $disableNotification,
                'protect_content' => $protectContent,
                'reply_to_message_id' => $replyToMessageId,
                'allow_sending_without_reply' => $allowSendingWithoutReply,
                'reply_markup' => $replyMarkup,
            ]
        );
    }

    public function sendGame(
        int|string $chatId,
        string $gameShortName,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
        ?bool $allowSendingWithoutReply = null,
        KeyboardMarkup $replyMarkup = null,
    ): array {
        return $this->caller->call(
            'sendGame',
            [
                'chat_id' => $chatId,
                'game_short_name' => $gameShortName,
                'disable_notification' => $disableNotification,
                'protect_content' => $protectContent,
                'reply_to_message_id' => $replyToMessageId,
                'allow_sending_without_reply' => $allowSendingWithoutReply,
                'reply_markup' => $replyMarkup,
            ]
        );
    }

    public function editMessageLiveLocation(
        float $latitude,
        float $longitude,
        ?int $horizontalAccuracy = null,
        ?int $heading = null,
        ?int $proximityAlertRadius = null,
        ?string $inlineMessageId = null,
        ?int $chatId = null,
        ?int $messageId = null,
        ?string $replyMarkup = null,
    ): array {
        return $this->caller->call(
            'editMessageLiveLocation',
            [
                'latitude' => $latitude,
                'longitude' => $longitude,
                'horizontal_accuracy' => $horizontalAccuracy,
                'heading' => $heading,
                'proximity_alert_radius' => $proximityAlertRadius,
                'inline_message_id' => $inlineMessageId,
                'chat_id' => $chatId,
                'message_id' => $messageId,
                'reply_markup' => $replyMarkup,
            ]
        );
    }

    public function stopMessageLiveLocation(
        ?string $inlineMessageId = null,
        ?int $chatId = null,
        ?int $messageId = null,
        ?string $replyMarkup = null,
    ): array {
        return $this->caller->call(
            'stopMessageLiveLocation',
            [
                'inline_message_id' => $inlineMessageId,
                'chat_id' => $chatId,
                'message_id' => $messageId,
                'reply_markup' => $replyMarkup,
            ]
        );
    }

    public function sendVenue(
        int|string $chatId,
        float $latitude,
        float $longitude,
        string $title,
        string $address,
        ?string $foursquareId = null,
        ?string $foursquareType = null,
        ?string $googlePlaceId = null,
        ?string $googlePlaceType = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
        ?bool $allowSendingWithoutReply = null,
        KeyboardMarkup $replyMarkup = null,
    ): array {
        return $this->caller->call(
            'sendVenue',
            [
                'chat_id' => $chatId,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'title' => $title,
                'address' => $address,
                'foursquare_id' => $foursquareId,
                'foursquare_type' => $foursquareType,
                'google_place_id' => $googlePlaceId,
                'google_place_type' => $googlePlaceType,
                'disable_notification' => $disableNotification,
                'protect_content' => $protectContent,
                'reply_to_message_id' => $replyToMessageId,
                'allow_sending_without_reply' => $allowSendingWithoutReply,
                'reply_markup' => $replyMarkup,
            ]
        );
    }

    public function sendContact(
        int|string $chatId,
        string $phoneNumber,
        string $firstName,
        ?string $lastName = null,
        ?string $vcard = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
        ?bool $allowSendingWithoutReply = null,
        KeyboardMarkup $replyMarkup = null,
    ): array {
        return $this->caller->call(
            'sendContact',
            [
                'chat_id' => $chatId,
                'phone_number' => $phoneNumber,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'vcard' => $vcard,
                'disable_notification' => $disableNotification,
                'protect_content' => $protectContent,
                'reply_to_message_id' => $replyToMessageId,
                'allow_sending_without_reply' => $allowSendingWithoutReply,
                'reply_markup' => $replyMarkup,
            ]
        );
    }

    public function sendPoll(
        int|string $chatId,
        string $question,
        array $options,
        ?bool $isAnonymous = null,
        ?PollType $type = null,
        ?bool $allowsMultipleAnswers = null,
        ?int $correctOptionId = null,
        ?bool $isClosed = null,
        ?int $openPeriod = null,
        ?int $closeDate = null,
        ?bool $isQuiz = null,
        ?int $explanationParseMode = null,
        ?string $explanation = null,
        ?bool $explanationEntities = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
        ?bool $allowSendingWithoutReply = null,
        KeyboardMarkup $replyMarkup = null,
    ): array {
        return $this->caller->call(
            'sendPoll',
            [
                'chat_id' => $chatId,
                'question' => $question,
                'options' => $options,
                'is_anonymous' => $isAnonymous,
                'type' => $type->value,
                'allows_multiple_answers' => $allowsMultipleAnswers,
                'correct_option_id' => $correctOptionId,
                'is_closed' => $isClosed,
                'open_period' => $openPeriod,
                'close_date' => $closeDate,
                'is_quiz' => $isQuiz,
                'explanation_parse_mode' => $explanationParseMode,
                'explanation' => $explanation,
                'explanation_entities' => $explanationEntities,
                'disable_notification' => $disableNotification,
                'protect_content' => $protectContent,
                'reply_to_message_id' => $replyToMessageId,
                'allow_sending_without_reply' => $allowSendingWithoutReply,
                'reply_markup' => $replyMarkup,
            ]
        );
    }

    public function sendDice(
        int|string $chatId,
        ?DiceEmoji $emoji = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?int $replyToMessageId = null,
        ?bool $allowSendingWithoutReply = null,
        KeyboardMarkup $replyMarkup = null,
    ): array {
        return $this->caller->call(
            'sendDice',
            [
                'chat_id' => $chatId,
                'emoji' => $emoji?->value,
                'disable_notification' => $disableNotification,
                'protect_content' => $protectContent,
                'reply_to_message_id' => $replyToMessageId,
                'allow_sending_without_reply' => $allowSendingWithoutReply,
                'reply_markup' => $replyMarkup,
            ]
        );
    }

    public function sendChatAction(
        int|string $chatId,
        ChatAction $action,
    ): array {
        return $this->caller->call(
            'sendChatAction',
            [
                'chat_id' => $chatId,
                'action' => $action->value,
            ]
        );
    }

    public function getUserProfilePhotos(
        int $userId,
        ?int $offset = null,
        ?int $limit = null,
    ): UserProfilePhotos {
        return $this->caller->call(
            'getUserProfilePhotos',
            [
                'user_id' => $userId,
                'offset' => $offset,
                'limit' => $limit,
            ]
        );
    }

    public function getFile(string $fileId): array {
        return $this->caller->call(
            'getFile',
            [
                'file_id' => $fileId,
            ]
        );
    }

    public function editMessageText(
        string|int $chatId,
        int $messageId,
        string $text,
        ParseMode $parseMode = ParseMode::MarkdownV2,
        ?array $entities = [],
        ?bool $disableWebPagePreview = null,
        ?bool $disableNotification = null,
    )
    {
        $text = match ($parseMode) {
            ParseMode::MarkdownV2 => MarkdownV2::escape($text),
            default => $text,
        };

        $request = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'text' => $text,
            'parse_mode' => $parseMode->value,
            'entities' => $entities,
            'disable_web_page_preview' => $disableWebPagePreview,
            'disable_notification' => $disableNotification,
        ];

        return $this->caller->call('editMessageText', $request);
    }

    public function editMessageCaption(
        string|int $chatId,
        ?int $messageId = null,
        ?string $inlineMessageId = null,
        ?string $caption = null,
        ParseMode $parseMode = ParseMode::MarkdownV2,
        ?array $captionEntities = [],
        ?KeyboardMarkup $replyMarkup = null,
    )
    {
        $caption = match ($parseMode) {
            ParseMode::MarkdownV2 => MarkdownV2::escape($caption),
            default => $caption,
        };

        $request = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'caption' => $caption,
            'parse_mode' => $parseMode->value,
            'caption_entities' => $captionEntities,
            'reply_markup' => $replyMarkup,
        ];

        return $this->caller->call('editMessageCaption', $request);
    }

    public function editMessageMedia(
        InputMedia $media,
        string|int $chatId = null,
        ?int $messageId = null,
        ?string $inlineMessageId = null,
        ?KeyboardMarkup $replyMarkup = null,
    )
    {
        $request = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'media' => $media,
            'reply_markup' => $replyMarkup,
        ];

        return $this->caller->call('editMessageMedia', $request);
    }

    public function editMessageReplyMarkup(
        string|int $chatId = null,
        ?int $messageId = null,
        ?string $inlineMessageId = null,
        ?KeyboardMarkup $replyMarkup = null,
    )
    {
        $request = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'reply_markup' => $replyMarkup,
        ];

        return $this->caller->call('editMessageReplyMarkup', $request);
    }

    public function stopPoll(
        string|int $chatId,
        int $messageId,
        ?KeyboardMarkup $replyMarkup = null,
    )
    {
        $request = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'reply_markup' => $replyMarkup,
        ];

        return $this->caller->call('stopPoll', $request);
    }

    public function deleteMessage(
        string|int $chatId,
        int $messageId,
    )
    {
        $request = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
        ];

        return $this->caller->call('deleteMessage', $request);
    }
}
