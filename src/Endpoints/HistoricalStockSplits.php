<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * request to /api/v3/historical-price-full/stock_split/$symbol
 * @link https://site.financialmodelingprep.com/developer/docs/#Historical-Stock-Splits FMP-doc: Historical-Stock-Splits
 */
final class HistoricalStockSplits extends AbstractEndpoint
{
    protected string $endpoint = 'historical-price-full/stock_split';
    protected string $apiVersion = 'v3';

    public function __invoke(string $symbol): HistoricalStockSplits
    {
        $this->setSymbol($symbol);

        return $this;
    }
}