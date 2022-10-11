<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class MyChatMember
{
    public function __construct(
        public Chat $chat,
        public User $user,
        public string $status,
        public ?int $untilDate,
        public ?bool $canBeEdited,
        public ?bool $canChangeInfo,
        public ?bool $canPostMessages,
        public ?bool $canEditMessages,
        public ?bool $canDeleteMessages,
        public ?bool $canInviteUsers,
        public ?bool $canRestrictMembers,
        public ?bool $canPinMessages,
        public ?bool $canPromoteMembers,
        public ?bool $canSendMessages,
        public ?bool $canSendMediaMessages,
        public ?bool $canSendPolls,
        public ?bool $canSendOtherMessages,
        public ?bool $canAddWebPagePreviews,
    ) {
    }

    public static function buildFromArray(mixed $my_chat_member)
    {
        return new self(
            Chat::buildFromArray($my_chat_member['chat']),
            User::buildFromArray($my_chat_member['user']),
            $my_chat_member['status'],
            $my_chat_member['until_date'] ?? null,
            $my_chat_member['can_be_edited'] ?? null,
            $my_chat_member['can_change_info'] ?? null,
            $my_chat_member['can_post_messages'] ?? null,
            $my_chat_member['can_edit_messages'] ?? null,
            $my_chat_member['can_delete_messages'] ?? null,
            $my_chat_member['can_invite_users'] ?? null,
            $my_chat_member['can_restrict_members'] ?? null,
            $my_chat_member['can_pin_messages'] ?? null,
            $my_chat_member['can_promote_members'] ?? null,
            $my_chat_member['can_send_messages'] ?? null,
            $my_chat_member['can_send_media_messages'] ?? null,
            $my_chat_member['can_send_polls'] ?? null,
            $my_chat_member['can_send_other_messages'] ?? null,
            $my_chat_member['can_add_web_page_previews'] ?? null,
        );
    }
}
