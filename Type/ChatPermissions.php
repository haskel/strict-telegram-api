<?php

declare(strict_types=1);

namespace Haskel\Telegram\Type;

class ChatPermissions
{
    public function __construct(
        public readonly ?bool $canSendMessages = null,
        public readonly ?bool $canSendMediaMessages = null,
        public readonly ?bool $canSendPolls = null,
        public readonly ?bool $canSendOtherMessages = null,
        public readonly ?bool $canAddWebPagePreviews = null,
        public readonly ?bool $canChangeInfo = null,
        public readonly ?bool $canInviteUsers = null,
        public readonly ?bool $canPinMessages = null,
    ) {
    }

    public static function buildFromArray(mixed $permissions)
    {
        return new self(
            $permissions['can_send_messages'] ?? null,
            $permissions['can_send_media_messages'] ?? null,
            $permissions['can_send_polls'] ?? null,
            $permissions['can_send_other_messages'] ?? null,
            $permissions['can_add_web_page_previews'] ?? null,
            $permissions['can_change_info'] ?? null,
            $permissions['can_invite_users'] ?? null,
            $permissions['can_pin_messages'] ?? null,
        );
    }
}
