<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/** Daily and Intraday technical indicators such as the SMA, EMA, and RSI are available, all options are displayed below.
 *
 * @link https://site.financialmodelingprep.com/developer/docs/#Daily-Indicators
 * @link https://site.financialmodelingprep.com/developer/docs/#Intraday-Indicators
 */
final class TechIndicators extends AbstractEndpoint
{
    protected string $endpoint = 'technical_indicator';
    protected string $apiVersion = 'v3';
    private const VALID_TYPE = [
        'sma',
        'ema',
        'wma',
        'dema',
        'tema',
        'williams',
        'rsi',
        'adx',
        'standardDeviation',
    ];
    private const VALID_INTERVAL = [
        '1min',
        '5min',
        '15min',
        '30min',
        '1hour',
        '4hour',
        'daily',
    ];

    /**
     * @param  string  $symbol
     * @param  string  $type  sma | ema | wma | dema | tema | williams | rsi | adx | standardDeviation
     * @param  int  $period  period of indicator
     * @param  string  $interval  1min | 5min | 15min | 30min | 1hour | 4hour | daily
     * @return TechIndicators
     */
    public function __invoke(string $symbol, string $type, int $period, string $interval): TechIndicators
    {
        $this->setSymbol($symbol);
        $this->setType($type);
        $this->setPeriod($period);
        $this->setInterval($interval);

        return $this;
    }

    private function setPeriod(int $period)
    {
        $this->addParams(['period' => $period]);
    }

    private function setType(string $type)
    {
        if ($this->validateType($type)) {
            $this->addParams(['type' => $type]);
        } else {
            throw new \InvalidArgumentException('Error! Allowed type: '.implode(' | ', self::VALID_TYPE));
        }
    }

    private function validateType(string $type): bool
    {
        return in_array($type, self::VALID_TYPE);
    }

    private function setInterval(string $interval)
    {
        if (in_array($interval, self::VALID_INTERVAL)) {
            $this->endpoint = $this->endpoint.'/'.$interval;
        } else {
            throw new \InvalidArgumentException(
                'Error! Allowed interval: '.implode(' | ', self::VALID_INTERVAL)
            );
        }
    }
}