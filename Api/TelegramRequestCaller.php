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
        ?string $baseUrl = null,
        private array $botTokens = [],
    ) {
        $this->baseUri = $baseUrl ?? 'https://api.telegram.org/bot';

        $this->client = new Client([]);
    }

    public function call(string $botName, string $method, array $requestParams = []): array
    {
        $requestParams = array_filter($requestParams);
        $this->botTokens[HappyCustomerBot::NAME] = '5453413332:AAE_9kjIvR72kN_iMT2RLz9QC1B9znz99ek';

        $token = $this->botTokens[$botName];
        $url = sprintf('%s%s/%s', $this->baseUri, $token, $method);

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
}
