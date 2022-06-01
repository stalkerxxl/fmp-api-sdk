<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * request to /delisted-companies?page=$page
 * @link https://site.financialmodelingprep.com/developer/docs/#Delisted-Companies FMP-doc: Delisted-Companies
 */
final class DelistedCompanies extends AbstractEndpoint
{
    protected string $endpoint = 'delisted-companies';
    protected string $apiVersion = 'v3';

    public function __invoke(int $page): DelistedCompanies
    {
        $this->addParams(['page' => $page]);
        return $this;
    }
}