<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type\InlineQueryResult;

class InlineQueryResultFactory
{
    public function createInlineQueryResultArticle(string $id, string $title, string $inputMessageContent, string $replyMarkup = null): InlineQueryResultArticle
    {
        return new InlineQueryResultArticle($id, $title, $inputMessageContent, $replyMarkup);
    }

    public function createInlineQueryResultPhoto(string $id, string $photoUrl, string $thumbUrl, string $title = null, string $description = null, string $caption = null, string $replyMarkup = null, string $inputMessageContent = null): InlineQueryResultPhoto
    {
        return new InlineQueryResultPhoto($id, $photoUrl, $thumbUrl, $title, $description, $caption, $replyMarkup, $inputMessageContent);
    }

    public function createInlineQueryResultGif(string $id, string $gifUrl, string $thumbUrl, string $title = null, string $caption = null, string $replyMarkup = null, string $inputMessageContent = null): InlineQueryResultGif
    {
        return new InlineQueryResultGif($id, $gifUrl, $thumbUrl, $title, $caption, $replyMarkup, $inputMessageContent);
    }

    public function createInlineQueryResultMpeg4Gif(string $id, string $mpeg4Url, string $thumbUrl, string $title = null, string $caption = null, string $replyMarkup = null, string $inputMessageContent = null): InlineQueryResultMpeg4Gif
    {
        return new InlineQueryResultMpeg4Gif($id, $mpeg4Url, $thumbUrl, $title, $caption, $replyMarkup, $inputMessageContent);
    }

    public function createInlineQueryResultVideo(string $id, string $videoUrl, string $mime, string $thumbUrl, string $title = null, string $caption = null, string $replyMarkup = null, string $inputMessageContent = null): InlineQueryResultVideo
    {
        return new InlineQueryResultVideo($id, $videoUrl, $mime, $thumbUrl, $title, $caption, $replyMarkup, $inputMessageContent);
    }

    public function createInlineQueryResultAudio(string $id, string $audioUrl, string $title, string $caption = null, string $performer = null, string $audioDuration = null, string $replyMarkup = null, string $inputMessageContent = null): InlineQueryResultAudio
    {

    }

    public function createInlineQueryResultVoice(string $id, string $voiceUrl, string $title, string $caption = null, string $voiceDuration = null, string $replyMarkup = null, string $inputMessageContent = null): InlineQueryResultVoice
    {

    }

    public function createInlineQueryResultDocument(string $id, string $documentUrl, string $title, string $caption = null, string $description = null, string $replyMarkup = null, string $inputMessageContent = null): InlineQueryResultDocument
    {

    }

    public function createInlineQueryResultLocation(string $id, string $latitude, string $longitude, string $title, string $livePeriod = null, string $replyMarkup = null, string $inputMessageContent = null): InlineQueryResultLocation
    {

    }

    public function createInlineQueryResultVenue(string $id, string $latitude, string $longitude, string $title, string $address, string $foursquareId = null, string $foursquareType = null, string $replyMarkup = null, string $inputMessageContent = null): InlineQueryResultVenue
    {

    }

    public function createInlineQueryResultContact(string $id, string $phoneNumber, string $firstName, string $lastName = null, string $vcard = null, string $replyMarkup = null, string $inputMessageContent = null): InlineQueryResultContact
    {

    }

    public function createInlineQueryResultGame(string $id, string $gameShortName, string $replyMarkup = null): InlineQueryResultGame
    {

    }

    public function createInlineQueryResultCachedPhoto(string $id, string $photoFileId, string $title = null, string $description = null, string $caption = null, string $replyMarkup = null, string $inputMessageContent = null): InlineQueryResultCachedPhoto
    {

    }

    public function createInlineQueryResultCachedGif(string $id, string $gifFileId, string $title = null, string $caption = null, string $replyMarkup = null, string $inputMessageContent = null): InlineQueryResultCachedGif
    {

    }

    public function createInlineQueryResultCachedMpeg4Gif(string $id, string $mpeg4FileId, string $title = null, string $caption = null, string $replyMarkup = null, string $inputMessageContent = null): InlineQueryResultCachedMpeg4Gif
    {

    }

    public function createInlineQueryResultCachedSticker(string $id, string $stickerFileId, string $replyMarkup = null, string $inputMessageContent = null): InlineQueryResultCachedSticker
    {

    }

    public function createInlineQueryResultCachedDocument(string $id, string $documentFileId, string $title, string $description = null, string $caption = null, string $replyMarkup = null, string $inputMessageContent = null): InlineQueryResultCachedDocument
    {

    }

    public function createInlineQueryResultCachedVideo(string $id, string $videoFileId, string $title, string $description = null, string $caption = null, string $replyMarkup = null, string $inputMessageContent = null): InlineQueryResultCachedVideo
    {

    }

    public function createInlineQueryResultCachedVoice(string $id, string $voiceFileId, string $title, string $caption = null, string $replyMarkup = null, string $inputMessageContent = null): InlineQueryResultCachedVoice
    {

    }

    public function createInlineQueryResultCachedAudio(string $id, string $audioFileId, string $caption = null, string $replyMarkup = null, string $inputMessageContent = null): InlineQueryResultCachedAudio
    {

    }

    public function createInputTextMessageContent(string $messageText, string $parseMode = null, bool $disableWebPagePreview = null): InputTextMessageContent
    {

    }

    public function createInputLocationMessageContent(string $latitude, string $longitude): InputLocationMessageContent
    {

    }

    public function createInputVenueMessageContent(string $latitude, string $longitude, string $title, string $address, string $foursquareId = null, string $foursquareType = null): InputVenueMessageContent
    {

    }

    public function createInputContactMessageContent(string $phoneNumber, string $firstName, string $lastName = null): InputContactMessageContent
    {

    }

    public function createChosenInlineResult(string $resultId, string $from, string $location = null, string $inlineMessageId = null, string $query): ChosenInlineResult
    {

    }
}
