<?php

namespace Kartulin\FmpApiSdk\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Kartulin\FmpApiSdk\Sender;

abstract class AbstractEndpoint
{
    protected string $requestUri;
    protected array $params = [];
    protected ?string $symbol = '';
    protected Sender $sender;

    public function __construct(Sender $client)
    {
        $this->sender = $client;
    }

    /**
     * @param  string  $symbol
     * @return static
     */
    protected function setSymbol(string $symbol): void
    {
        $this->symbol = strtoupper($symbol);
    }

    /**
     * @param  array  $params
     * @return void
     */
    protected function addParams(array $params): void
    {
        $this->params = array_merge($this->params, $params);
    }

    /** send request to fmp-api. See doc from child endpoint
     * @return array|object
     * @throws GuzzleException
     */
    public function get()
    {
        $this->requestUri = $this->apiVersion.'/'.$this->endpoint.'/'.$this->symbol;

        return $this->sender->callApi($this->requestUri, $this->params);
    }

}