<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * request to /profile/$symbol
 * @link https://site.financialmodelingprep.com/developer/docs/#Company-Profile FMP-doc-Company-Profile
 */
final class CompanyProfile extends AbstractEndpoint
{
    protected string $endpoint = 'profile';
    protected string $apiVersion = 'v3';

    public function __invoke(string $symbol): self
    {
        $this->setSymbol($symbol);
        return $this;
    }
}