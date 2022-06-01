<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * request to /fmp/articles?page=$page&size=$size and return the OBJECT (not array)!!!
 *
 * @method get() return the OBJECT (not array)!!!
 * @link https://site.financialmodelingprep.com/developer/docs/#FMP-Articles FMP-doc: FMP-FmpArticles
 */
final class FmpArticles extends AbstractEndpoint
{
    protected string $endpoint = 'fmp/articles';
    protected string $apiVersion = 'v3';

    public function __invoke(int $page, int $size): self
    {
        $this->addParams([
            'page' => $page,
            'size' => $size,
        ]);

        return $this;
    }
}