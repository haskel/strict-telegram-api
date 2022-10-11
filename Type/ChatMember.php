<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class ChatMember
{
    public function __construct(
        public User $user,
        public string $status,
        public ?string $customTitle,
        public ?bool $isAnonymous,
        public ?bool $canBeEdited,
        public ?bool $canManageChat,
        public ?bool $canPostMessages,
        public ?bool $canEditMessages,
        public ?bool $canDeleteMessages,
        public ?bool $canManageVoiceChats,
        public ?bool $canRestrictMembers,
        public ?bool $canPromoteMembers,
        public ?bool $canChangeInfo,
        public ?bool $canInviteUsers,
        public ?bool $canPinMessages,
        public ?bool $isMember,
        public ?bool $canSendMessages,
        public ?bool $canSendMediaMessages,
        public ?bool $canSendPolls,
        public ?bool $canSendOtherMessages,
        public ?bool $canAddWebPagePreviews,
    ) {
    }

    public static function buildFromArray(mixed $chat_member)
    {
        return new self(
            User::buildFromArray($chat_member['user']),
            $chat_member['status'],
            $chat_member['custom_title'] ?? null,
            $chat_member['is_anonymous'] ?? null,
            $chat_member['can_be_edited'] ?? null,
            $chat_member['can_manage_chat'] ?? null,
            $chat_member['can_post_messages'] ?? null,
            $chat_member['can_edit_messages'] ?? null,
            $chat_member['can_delete_messages'] ?? null,
            $chat_member['can_manage_voice_chats'] ?? null,
            $chat_member['can_restrict_members'] ?? null,
            $chat_member['can_promote_members'] ?? null,
            $chat_member['can_change_info'] ?? null,
            $chat_member['can_invite_users'] ?? null,
            $chat_member['can_pin_messages'] ?? null,
            $chat_member['is_member'] ?? null,
            $chat_member['can_send_messages'] ?? null,
            $chat_member['can_send_media_messages'] ?? null,
            $chat_member['can_send_polls'] ?? null,
            $chat_member['can_send_other_messages'] ?? null,
            $chat_member['can_add_web_page_previews'] ?? null,
        );
    }
}
