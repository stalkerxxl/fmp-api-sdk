<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * request to /is-the-market-open
 * @link https://site.financialmodelingprep.com/developer/docs/#NYSE-Holidays-and-Trading-Hours
 */
final class TradingHours extends AbstractEndpoint
{
    protected string $endpoint = 'is-the-market-open';
    protected string $apiVersion = 'v3';

    public function __invoke(): TradingHours
    {
        return $this;
    }
}