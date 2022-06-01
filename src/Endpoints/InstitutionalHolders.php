<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * request to /api/v3/institutional-holder/$symbol
 * @link https://site.financialmodelingprep.com/developer/docs/#Institutional-Holders FMP-doc: Institutional-Holders
 */
final class InstitutionalHolders extends AbstractEndpoint
{
    protected string $endpoint = 'institutional-holder';
    protected string $apiVersion = 'v3';

    public function __invoke(string $symbol): InstitutionalHolders
    {
        $this->setSymbol($symbol);

        return $this;
    }
}