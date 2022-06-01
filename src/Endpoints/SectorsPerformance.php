<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * request to /sector-performance or /historical-sectors-performance?limit=$limit
 * @link https://site.financialmodelingprep.com/developer/docs/#Stock-Market-Sectors-Performance FMP-doc: Stock-Market-Sectors-Performance
 */
final class SectorsPerformance extends AbstractEndpoint
{
    protected string $endpoint = 'sector-performance';
    protected string $apiVersion = 'v3';

    public function __invoke(int $limit = null): SectorsPerformance
    {
        if ($limit) {
            $this->addParams(['limit' => $limit]);
            $this->endpoint = 'historical-sectors-performance';
        }
        return $this;
    }
}