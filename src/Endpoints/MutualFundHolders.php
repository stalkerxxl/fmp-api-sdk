<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * request to /api/v3/mutual-fund-holder/$symbol
 * @link https://site.financialmodelingprep.com/developer/docs/#Mutual-Fund-Holders FMP-doc: Mutual-Fund-Holders
 */
final class MutualFundHolders extends AbstractEndpoint
{
    protected string $endpoint = 'mutual-fund-holder';
    protected string $apiVersion = 'v3';

    public function __invoke(string $symbol): MutualFundHolders
    {
        $this->setSymbol($symbol);

        return $this;
    }
}