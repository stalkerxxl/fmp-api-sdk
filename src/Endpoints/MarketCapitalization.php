<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * request to /market-capitalization/$symbol or /historical-market-capitalization/$symbol?limit=$limit
 * @link https://site.financialmodelingprep.com/developer/docs/#Market-Capitalization FMP-doc: Market-Capitalization
 */
final class MarketCapitalization extends AbstractEndpoint
{
    protected string $endpoint = 'market-capitalization';
    protected string $apiVersion = 'v3';

    public function __invoke(string $symbol, int $limit = null): MarketCapitalization
    {
        $this->setSymbol($symbol);
        if ($limit) {
            $this->endpoint = 'historical-market-capitalization';
            $this->addParams(['limit' => $limit]);
        }

        return $this;
    }
}