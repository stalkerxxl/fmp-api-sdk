<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * request to /quote/$symbol or /otc/real-time-price/$symbol
 *
 * @link https://site.financialmodelingprep.com/developer/docs/#Company-Quote FMP-doc Company-Quote
 */
final class CompanyQuote extends AbstractEndpoint
{
    protected string $endpoint = 'quote';
    protected string $apiVersion = 'v3';

    /**
     * @param  string  $symbol example: 'AAPL' or 'AAPL, FB, MSFT'
     * @param  bool  $otc  TRUE for /otc/real-time-price/$symbol endpoint
     */
    public function __invoke(string $symbol, bool $otc = false): CompanyQuote
    {
        $this->setSymbol($symbol);
        if ($otc) {
            $this->setOtcRealTimePrice();
        }

        return $this;
    }

    /**
     * Prices of OTC companies: /otc/real-time-price/BATRB,FWONB,GBTC
     */
    private function setOtcRealTimePrice()
    {
        $this->endpoint = 'otc/real-time-price';

    }


}