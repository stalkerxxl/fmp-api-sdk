<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * request to /api/v3/etf-stock-exposure/$symbol
 * @link https://site.financialmodelingprep.com/developer/docs/#ETF-Stock-Exposure FMP-doc: ETF-Stock-Exposure
 */
final class EtfStockExposure extends AbstractEndpoint
{
    protected string $endpoint = 'etf-stock-exposure';
    protected string $apiVersion = 'v3';

    public function __invoke(string $symbol): EtfStockExposure
    {
        $this->setSymbol($symbol);

        return $this;
    }
}