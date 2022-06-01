<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * request /stock-price-change/$symbol
 * @link https://site.financialmodelingprep.com/developer/docs/#Stock-price-change FMP-doc
 */
final class StockPriceChange extends AbstractEndpoint
{
    protected string $endpoint = 'stock-price-change';
    protected string $apiVersion = 'v3';

    public function __invoke(string $symbol): StockPriceChange
    {
        $this->setSymbol($symbol);

        return $this;
    }
}