<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * request to /etf-sector-weightings/$symbol
 * @link https://site.financialmodelingprep.com/developer/docs/#ETF-Sector-Weightings FMP-doc: ETF-Sector-Weightings
 */
final class EtfSectorWeightings extends AbstractEndpoint
{
    protected string $endpoint = 'etf-sector-weightings';
    protected string $apiVersion = 'v3';

    public function __invoke(string $symbol): EtfSectorWeightings
    {
        $this->setSymbol($symbol);

        return $this;
    }
}