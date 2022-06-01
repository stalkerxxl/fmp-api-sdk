<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * request to /etf-country-weightings/$symbol
 * @link https://site.financialmodelingprep.com/developer/docs/#ETF-Country-Weightings FMP-doc: ETF-Country-Weightings
 */
final class EtfCountryWeightings extends AbstractEndpoint
{
    protected string $endpoint = 'etf-country-weightings';
    protected string $apiVersion = 'v3';

    public function __invoke(string $symbol): EtfCountryWeightings
    {
        $this->setSymbol($symbol);
        return $this;
    }
}