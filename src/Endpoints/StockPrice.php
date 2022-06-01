<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * request to /quotes/nyse or /quote-short/$symbol
 * @link https://site.financialmodelingprep.com/developer/docs/#Stock-Price
 */
final class StockPrice extends AbstractEndpoint
{
    protected string $endpoint = 'quote-short';
    protected string $apiVersion = 'v3';

    public function __invoke(string $symbol = null): StockPrice
    {
        if ($symbol) {
            $this->setSymbol($symbol);
        } else {
            $this->getAllQuotesNyse();
        }
        return $this;
    }

    private function getAllQuotesNyse()
    {
        $this->symbol = 'nyse';
        $this->endpoint = 'quotes';
    }
}