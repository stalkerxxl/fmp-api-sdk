<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * request to /historical-chart/$interval/$symbol or /historical-price-full/$symbol
 * @link  https://site.financialmodelingprep.com/developer/docs/#Stock-Historical-Price FMP-doc: Stock-Historical-Price
 */
final class HistoricalPrice extends AbstractEndpoint
{
    protected string $endpoint = 'historical-chart';
    protected string $apiVersion = 'v3';
    private const VALID_INTERVAL = [
        '1min',
        '5min',
        '15min',
        '30min',
        '1hour',
        '4hour',
    ];
    private const VALID_SERIETYPE = [
        'line',
        'bar',
    ];

    /**
     * @param  string  $symbol
     * @param  string|null  $interval  1min | 5min | 15min | 30min | 1hour | 4hour
     * @return HistoricalPrice
     */
    public function __invoke(string $symbol, string $interval = null): HistoricalPrice
    {
        $this->setSymbol($symbol);
        if (is_null($interval)) {
            $this->setHistoricalPriceFull();
        } else {
            $this->setHistoricalChart($interval);
        }

        return $this;
    }

    /**
     * send request: /api/v3/historical-chart/$interval/$symbol?params....
     * @return void
     */
    private function setHistoricalChart(string $interval)
    {
        if (!$this->validateInterval($interval)) {
            throw new \InvalidArgumentException(
                'Error! Allowed interval: '.implode(' | ', self::VALID_INTERVAL)
            );
        }
        $this->endpoint = $this->endpoint.'/'.$interval;
    }

    /**
     * send request: /api/v3/historical-price-full/$symbol?params....
     * @return void
     */
    private function setHistoricalPriceFull()
    {
        $this->endpoint = 'historical-price-full';
    }

    /**
     * @param  string  $from  YYYY-MM-DD
     * @return HistoricalPrice
     */
    public function setFrom(string $from): self
    {
        $this->addParams(['from' => $from]);

        return $this;
    }

    /**
     * @param  string  $to  YYYY-MM-DD
     * @return HistoricalPrice
     */
    public function setTo(string $to): HistoricalPrice
    {
        $this->addParams(['to' => $to]);

        return $this;
    }

    /**
     * @param  int  $timeseries  Number (return last x days)
     * @return HistoricalPrice
     */
    public function setTimeseries(int $timeseries): self
    {
        $this->addParams(['timeseries' => $timeseries]);

        return $this;
    }

    /**
     * @param  string  $serietype  line | bar
     * @return HistoricalPrice
     */
    public function setSerietype(string $serietype): self
    {
        if (!$this->validateSerietype($serietype)) {
            throw new \InvalidArgumentException(
                'Error! Allowed serietype: '.implode(' | ', self::VALID_SERIETYPE)
            );
        }
        $this->addParams(['serietype' => $serietype]);

        return $this;
    }

    private function validateSerietype(string $serietype): bool
    {
        return in_array($serietype, self::VALID_SERIETYPE);
    }

    private function validateInterval(string $interval): bool
    {
        return in_array($interval, self::VALID_INTERVAL);
    }
}