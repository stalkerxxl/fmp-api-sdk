<?php

namespace Kartulin\FmpApiSdk;

use Kartulin\FmpApiSdk\Endpoints\AbstractEndpoint;

/**
 * @method Endpoints\CompanyProfile companyProfile(string $symbol)
 * @method Endpoints\CompanyQuote companyQuote(string $symbol, bool $otc = false)
 * @method Endpoints\DelistedCompanies delistedCompanies(int $page)
 * @method Endpoints\EtfCountryWeightings etfCountryWeightings(string $symbol)
 * @method Endpoints\EtfHolders etfHolders(string $symbol)
 * @method Endpoints\EtfSectorWeightings etfSectorWeightings(string $symbol)
 * @method Endpoints\EtfStockExposure etfStockExposure(string $symbol)
 * @method Endpoints\FmpArticles fmpArticles(int $page, int $size)
 * @method Endpoints\HistoricalStockSplits historicalStockSplits(string $symbol)
 * @method Endpoints\InstitutionalHolders institutionalHolders(string $symbol)
 * @method Endpoints\KeyExecutives keyExecutives(string $symbol)
 * @method Endpoints\MarketCapitalization marketCapitalization(string $symbol, int $limit = null)
 * @method Endpoints\MutualFundHolders mutualFundHolders(string $symbol)
 * @method Endpoints\SectorsPerformance sectorsPerformance(int $limit = null)
 * @method Endpoints\HistoricalPrice historicalPrice(string $symbol, string $interval = null)
 * @method Endpoints\StockPriceChange stockPriceChange(string $symbol)
 * @method Endpoints\StockPrice stockPrice(string $symbol = null)
 * @method Endpoints\StockList stockList(string $type)
 * @method Endpoints\StockMarketMost stockMarketMost(string $type)
 * @method Endpoints\TradingHours tradingHours()
 * @method Endpoints\TechIndicators techIndicators(string $symbol, string $type, int $period, string $interval)
 */
final class FMP
{
    private const ENDPOINTS_DIR = 'Endpoints';
    private Sender $client;

    public function __construct(string $token)
    {
        $this->client = new Sender($token);
    }

    public static function make(string $token): self
    {
        return new self($token);
    }

    public function __call($name, $args)
    {
        return $this->createEndpoint($name, $args);
    }


    private function createEndpoint(string $className, array $args): AbstractEndpoint
    {
        $class = __NAMESPACE__.'\\'.self::ENDPOINTS_DIR.'\\'.$className;
        if (class_exists($class)) {
            $className = new $class($this->client);

            return call_user_func_array($className, $args);
        }
        throw new \BadMethodCallException($className." method doesn't exist in ".__CLASS__);
    }
}