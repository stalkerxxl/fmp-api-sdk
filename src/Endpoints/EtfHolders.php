<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * request to /etf-holder/$symbol
 * @link https://site.financialmodelingprep.com/developer/docs/#ETF-Holders FMP-doc: ETF-Holders
 */
final class EtfHolders extends AbstractEndpoint
{
    protected string $endpoint = 'etf-holder';
    protected string $apiVersion = 'v3';

    public function __invoke(string $symbol): EtfHolders
    {
        $this->setSymbol($symbol);
        return $this;
    }
}