<?php

declare(strict_types=1);

namespace Haskel\Telegram\Api;

use App\Constant\HappyCustomerBot;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class TelegramRequestCaller
{
    private Client $client;
    private string $baseUri;

    public function __construct(
        private string $token,
        ?string $baseUrl = null,
    ) {
        $this->baseUri = $baseUrl ?? 'https://api.telegram.org/bot';

        $this->client = new Client([]);
    }

    public function call(string $method, array $requestParams = []): array
    {
        $requestParams = $this->arrayFilterRecursive($requestParams);

        $url = sprintf('%s%s/%s', $this->baseUri, $this->token, $method);

        try {
            $response = $this->client->request(
                'POST',
                $url,
                [
                    'json' => $requestParams,
                ]
            );

            $response->getStatusCode();

            $responseBody = $response->getBody()->getContents();

            return json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);

        } catch (RequestException $e) {
            $response = $e->getResponse()?->getBody()->getContents();
        }

        return [];
    }

    protected function arrayFilterRecursive($input): array
    {
        foreach ($input as &$value)
        {
            if (is_array($value))
            {
                $value = $this->arrayFilterRecursive($value);
            }
        }

        return array_filter($input, fn($value) => $value !== null);
    }
}
