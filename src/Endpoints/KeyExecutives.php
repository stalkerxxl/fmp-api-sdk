<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * send request to /api/v3/key-executives/$symbol
 * @link https://site.financialmodelingprep.com/developer/docs/#Key-Executives FMP-doc: Key-Executives
 */
final class KeyExecutives extends AbstractEndpoint
{
    protected string $endpoint = 'key-executives';
    protected string $apiVersion = 'v3';

    public function __invoke(string $symbol): KeyExecutives
    {
        $this->setSymbol($symbol);
        return $this;
    }
}