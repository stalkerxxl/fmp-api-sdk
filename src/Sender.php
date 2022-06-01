<?php

namespace Kartulin\FmpApiSdk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

final class Sender
{
    private const GUZZLE_CONFIG = [
        'base_uri' => 'https://financialmodelingprep.com/api/',
        'headers' => [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ],
    ];
    private string $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @param  string  $requestUri
     * @param  array|null  $params
     * @return array|object
     * @throws GuzzleException
     */
    public function callApi(string $requestUri, array $params = null)
    {
        if (empty($params)) {
            $query = ['query' => ['apikey' => $this->token]];
        } else {
            $query = ['query' => array_merge(['apikey' => $this->token], $params)];
        }

        $client = new Client(self::GUZZLE_CONFIG);
        $response = $client->get($requestUri, $query);

        return json_decode($response->getBody()->getContents());
    }
}