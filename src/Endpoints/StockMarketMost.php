<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * request to /stock_market/$type
 * @link https://site.financialmodelingprep.com/developer/docs/#Most-Gainer-Stock-Companies FMP-doc
 */
final class StockMarketMost extends AbstractEndpoint
{
    protected string $endpoint = 'stock_market';
    protected string $apiVersion = 'v3';
    private const VALID_TYPE = [
        'gainers',
        'losers',
        'actives',
    ];

    public function __invoke(string $type): StockMarketMost
    {
        $this->setType($type);
        return $this;
    }

    private function setType(string $type)
    {
        if (in_array($type, self::VALID_TYPE)) {
            $this->endpoint = $this->endpoint.'/'.$type;
        } else {
            throw new \InvalidArgumentException(
                'Error! Allowed interval: '.implode(' | ', self::VALID_TYPE)
            );
        }
    }
}