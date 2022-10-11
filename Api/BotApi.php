<?php

declare(strict_types=1);

namespace Haskel\Telegram\Api;

use Haskel\Telegram\Type\BotCommandScope;
use Haskel\Telegram\Type\InputFile;
use Haskel\Telegram\Type\LanguageCode;

class BotApi
{
    public function getMe(): array
    {
        return [];
    }

    public function logOut(): array
    {
        return [];
    }

    public function close(): array
    {
        return [];
    }

    public function setMyCommands(array $commands, 	BotCommandScope $scope, LanguageCode $languageCode): array
    {
        return [];
    }

    public function getMyCommands(LanguageCode $languageCode): array
    {
        return [];
    }

    public function deleteMyCommands(BotCommandScope $scope, LanguageCode $languageCode): array
    {
        return [];
    }

    public function getWebhookInfo(
        string $url,
        bool $hasCustomCertificate,
        int $pendingUpdateCount,
        ?int $ipAddress = null,
        ?int $lastErrorDate = null,
        ?string $lastErrorMessage = null,
        ?string $lastSynchronizationErrorDate = null,
        ?int $maxConnections = null,
        ?array $allowedUpdates = null,
    ): array {
        return [];
    }

    public function setWebhook(
        string $url,
        ?InputFile $certificate = null,
        string $ipAddress = null,
        ?int $maxConnections = null,
        ?array $allowedUpdates = null,
        ?bool $dropPendingUpdates = null,
        ?string $secretToken = null,
    ): array {
        return [];
    }

    public function deleteWebhook(?bool $dropPendingUpdates = null): array
    {
        return [];
    }

    public function getUpdates(
        ?int $offset = null,
        ?int $limit = null,
        ?int $timeout = null,
        ?array $allowedUpdates = null,
    ): array {
        return [];
    }
}
