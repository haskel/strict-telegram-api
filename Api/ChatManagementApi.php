<?php

declare(strict_types=1);

namespace Haskel\Telegram\Api;

use Haskel\Telegram\Type\ChatAdministratorRights;
use Haskel\Telegram\Type\ChatPermissions;
use Haskel\Telegram\Type\InputFile;
use Haskel\Telegram\Type\MenuButton;

class ChatManagementApi
{
    public function getUserProfilePhotos(
        int $userId,
        ?int $offset = null,
        ?int $limit = null,
    ): array {
        return [];
    }

    public function banChatMember(
        int|string $chatId,
        int $userId,
        ?int $untilDate = null,
        ?bool $revokeMessages = null,
    ): array {
        return [];
    }

    public function unbanChatMember(
        int|string $chatId,
        int $userId,
        ?bool $onlyIfBanned = null,
    ): array {
        return [];
    }

    public function restrictChatMember(
        int|string $chatId,
        int $userId,
        array $permissions,
        ?int $untilDate = null,
    ): array {
        return [];
    }

    public function promoteChatMember(
        int|string $chatId,
        int $userId,
        ?bool $isAnonymous = null,
        ?bool $canMangeChat = null,
        ?bool $canPostMessages = null,
        ?bool $canEditMessages = null,
        ?bool $canDeleteMessages = null,
        ?bool $canManageVideoChats = null,
        ?bool $canRestrictMembers = null,
        ?bool $canPromoteMembers = null,
        ?bool $canChangeInfo = null,
        ?bool $canInviteUsers = null,
        ?bool $canPinMessages = null,
    ): array {
        return [];
    }

    public function setChatAdministratorCustomTitle(
        int|string $chatId,
        int $userId,
        string $customTitle,
    ): array {
        return [];
    }

    public function banChatSenderChat(
        int|string $chatId,
        int $senderChatId
    ): array {
        return [];
    }

    public function unbanChatSenderChat(
        int|string $chatId,
        int $senderChatId
    ): array {
        return [];
    }

    public function setChatPermissions(
        int|string $chatId,
        ChatPermissions $permissions,
    ): array {
        return [];
    }

    public function exportChatInviteLink(int|string $chatId): array
    {
        return [];
    }

    public function createChatInviteLink(
        int|string $chatId,
        string $name,
        ?int $expireDate = null,
        ?int $memberLimit = null,
        ?bool $createsJoinRequest = null,
    ): array {
        return [];
    }

    public function editChatInviteLink(
        int|string $chatId,
        string $inviteLink,
        ?string $name = null,
        ?int $expireDate = null,
        ?int $memberLimit = null,
        ?bool $createsJoinRequest = null,
    ): array {
        return [];
    }

    public function revokeChatInviteLink(
        int|string $chatId,
        string $inviteLink,
    ): array {
        return [];
    }

    public function approveChatJoinRequest(
        int|string $chatId,
        int $userId,
    ): array {
        return [];
    }

    public function declineChatJoinRequest(
        int|string $chatId,
        int $userId,
    ): array {
        return [];
    }

    public function setChatPhoto(
        int|string $chatId,
        InputFile $photo,
    ): array {
        return [];
    }

    public function deleteChatPhoto(int|string $chatId): array {
        return [];
    }

    public function setChatTitle(
        int|string $chatId,
        string $title,
    ): array {
        return [];
    }

    public function setChatDescription(
        int|string $chatId,
        string $description,
    ): array {
        return [];
    }

    public function pinChatMessage(
        int|string $chatId,
        int $messageId,
        ?bool $disableNotification = null,
    ): array {
        return [];
    }

    public function unpinChatMessage(
        int|string $chatId,
        ?int $messageId = null,
    ): array {
        return [];
    }

    public function unpinAllChatMessages(int|string $chatId): array
    {
        return [];
    }

    public function leaveChat(int|string $chatId): array
    {
        return [];
    }

    public function getChat(int|string $chatId): array
    {
        return [];
    }

    public function getChatAdministrators(int|string $chatId): array
    {
        return [];
    }

    public function getChatMembersCount(int|string $chatId): array
    {
        return [];
    }

    public function getChatMember(
        int|string $chatId,
        int $userId,
    ): array {
        return [];
    }

    public function setChatStickerSet(
        int|string $chatId,
        string $stickerSetName,
    ): array {
        return [];
    }

    public function deleteChatStickerSet(int|string $chatId): array
    {
        return [];
    }

    public function setChatMenuButton(
        int|string $chatId,
        MenuButton $menuButton,
    ): array {
        return [];
    }

    public function getChatMenuButton(int|string $chatId): array
    {
        return [];
    }

    public function setMyDefaultAdministratorRights(
        ChatAdministratorRights $rights = null,
        ?bool $forChannels = null,
    ): array
    {
        return [];
    }

    public function getMyDefaultAdministratorRights(?bool $forChannels = null): array
    {
        return [];
    }
}
