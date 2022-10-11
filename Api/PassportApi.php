<?php

declare(strict_types=1);

namespace Haskel\Telegram\Api;

class PassportApi
{
    public function setPassportDataErrors(
        int $userId,
        array $errors
    ): bool
    {
        $data = [
            'user_id' => $userId,
            'errors' => $errors,
        ];

        return $this->request('setPassportDataErrors', $data);
    }
}
