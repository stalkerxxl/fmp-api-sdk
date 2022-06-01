# FMP-API-SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kartulin/fmp-api-sdk.svg?style=flat-square)](https://packagist.org/packages/kartulin/fmp-api-sdk)
[![Total Downloads](https://img.shields.io/packagist/dt/kartulin/fmp-api-sdk.svg?style=flat-square)](https://packagist.org/packages/kartulin/fmp-api-sdk)

Comfortable library to work with [FinancialModelingPrep.com](https://financialmodelingprep.com/). Easily integrates with any php-framework.
You must have [api_key](https://site.financialmodelingprep.com/developer/docs/dashboard) to start working. It's free...
## Installation

You can install the package via composer (_php 7.4 and higher_):
```bash
composer require kartulin/fmp-api-sdk
```
## Usage
```php
use Kartulin\FmpApiSdk\FMP;

$token='you_api_key_here';

//You must initialize the client with $token
//You can use DI of your framework
$client = FMP::make($token);
// or
$client = new FMP($token);

// Select required endpoint with arguments
$response = $client->companyQuote('aapl', true)->get();
// or
$response = FMP::make($config)->companyQuote('AAPL', true)->get();

var_dump($response) // is array
^ array:1 [▼
  0 => {#37 ▼
    +"symbol": "AAPL"
    +"name": "Apple Inc."
    +"price": 148.84
    +"changesPercentage": -0.53461844
    +"change": -0.80000305
    +"dayLow": 146.84
   any_data
  }
]
```
All endpoint classes are well documented, have link to FMP documentation service. Also autocomplete IDE is working.


## list of available Endpoints and classes of this package
| FMP-Endpoint-URL                                                                                                          | Work | Class                 |
|---------------------------------------------------------------------------------------------------------------------------|:----:|-----------------------|
| **STOCK FUNDAMENTALS**                                                                                                    |      |                       |
|                                                                                                                           |      |                       |
| **STOCK FUNDAMENTALS ANALYSIS**                                                                                           |      |                       |
|                                                                                                                           |      |                       |
| **INSTITUTIONAL STOCK OWNERSHIP**                                                                                         |      |                       |
|                                                                                                                           |      |                       |
| **PRICE TARGET**                                                                                                          |      |                       |
|                                                                                                                           |      |                       |
| **Upgrades & Downgrades**                                                                                                 |      |                       |
|                                                                                                                           |      |                       |
| **historical ETF and Mutual Fund Holdings**                                                                               |      |                       |
|                                                                                                                           |      |                       |
| **HISTORICAL NUMBER OF EMPLOYEES**                                                                                        |      |                       |
|                                                                                                                           |      |                       |
| **EXECUTIVE COMPENSATION**                                                                                                |      |                       |
|                                                                                                                           |      |                       |
| **INDIVIDUAL BENEFICIAL OWNERSHIP**                                                                                       |      |                       |
|                                                                                                                           |      |                       |
| **STOCK CALENDARS**                                                                                                       |      |                       |
|                                                                                                                           |      |                       |
| **STOCK LOOK UP TOOL**                                                                                                    |      |                       |
| [Ticker Search]()                                                                                                         |      | in progress           |
| [Stock Screener]()                                                                                                        |      | in progress           |
| **COMPANY INFORMATION**                                                                                                   |      |                       |
| [Company Profile](https://site.financialmodelingprep.com/developer/docs/#Company-Profile)                                 |  ✔   | CompanyProfile        |
| [Key Executives](https://site.financialmodelingprep.com/developer/docs/#Key-Executives)                                   |  ✔   | KeyExecutives         |
| [Market Capitalization](https://site.financialmodelingprep.com/developer/docs/#Market-Capitalization)                     |  ✔   | MarketCapitalization  |
| [Company Outlook]()                                                                                                       |      |                       |
| [Stock Peers]()                                                                                                           |      |                       |
| [NYSE Holidays and Trading Hours](https://site.financialmodelingprep.com/developer/docs/#NYSE-Holidays-and-Trading-Hours) |  ✔   | TradingHours          |
| [Delisted Companies](https://site.financialmodelingprep.com/developer/docs/#Delisted-Companies)                           |  ✔   | DelistedCompanies     |
| [Company core information]()                                                                                              |      |                       |
| **STOCK NEWS**                                                                                                            |      |                       |
| [FMP Articles](https://site.financialmodelingprep.com/developer/docs/#FMP-Articles)                                       |  ✔   | Articles              |
| [Stock News]()                                                                                                            |      |                       |
| [Press Releases]()                                                                                                        |      |                       |
| **MARKET PERFORMANCE**                                                                                                    |      |                       |
| [Sectors PE Ratio]()                                                                                                      |      |                       |
| [Industries PE Ratio]()                                                                                                   |      |                       |
| [Sectors Performance](https://site.financialmodelingprep.com/developer/docs/#Stock-Market-Sectors-Performance)            |  ✔   | SectorsPerformance    |
| [Most Gainer Stock Companies](https://site.financialmodelingprep.com/developer/docs/#Most-Gainer-Stock-Companies)         |  ✔   | StockMarketMost       |
| [Most Loser Stock Companies](https://site.financialmodelingprep.com/developer/docs/#Most-Loser-Stock-Companies)           |  ✔   | StockMarketMost       |
| [Most Active Stock Companies](https://site.financialmodelingprep.com/developer/docs/#Most-Active-Stock-Companies)         |  ✔   | StockMarketMost       |
| **ADVANCED DATA**                                                                                                         |      |                       |
| ---premium endpoints---                                                                                                   |      |                       |
| **STOCK STATISTICS**                                                                                                      |      |                       |
| ---premium endpoints---                                                                                                   |      |                       |
| **INSIDER TRADING**                                                                                                       |      |                       |
| ---premium endpoints---                                                                                                   |      |                       |
| **ECONOMICS**                                                                                                             |      |                       |
| ---premium endpoints---                                                                                                   |      |                       |
|                                                                                                                           |      |                       |
| **STOCK PRICE**                                                                                                           |      |                       |
| [Stock Historical Price](https://site.financialmodelingprep.com/developer/docs/#Stock-Historical-Price)                   |  ✔   | HistoricalPrice       |
| [Company Quote](https://site.financialmodelingprep.com/developer/docs/#Company-Quote)                                     |  ✔   | CompanyQuote          |
| [Stock Price Change](https://site.financialmodelingprep.com/developer/docs/#Stock-price-change)                           |  ✔   | StockPriceChange      |
| [Stock Price](https://site.financialmodelingprep.com/developer/docs/#Stock-Price)                                         |  ✔   | StockPrice            |
| [Historical Stock Splits](https://site.financialmodelingprep.com/developer/docs/#Historical-Stock-Splits)                 |  ✔   | HistoricalStockSplits |
| [Survivorship Bias Free](https://site.financialmodelingprep.com/developer/docs/#Survivorship-Bias-Free-EOD)               |      |                       |
| [Daily Indicators](https://site.financialmodelingprep.com/developer/docs/#Daily-Indicators)                               |  ✔   | TechIndicators        |
| [Intraday Indicators](https://site.financialmodelingprep.com/developer/docs/#Intraday-Indicators)                         |  ✔   | TechIndicators        |
| **FUND HOLDINGS**                                                                                                         |      |                       |
| [ETF Holders](https://site.financialmodelingprep.com/developer/docs/#ETF-Holders)                                         |  ✔   | EtfHolders            |
| [Institutional Holders](https://site.financialmodelingprep.com/developer/docs/#Institutional-Holders)                     |  ✔   | InstitutionalHolders  |
| [Mutual Fund Holders](https://site.financialmodelingprep.com/developer/docs/#Mutual-Fund-Holders)                         |  ✔   | MutualFundHolders     |
| [ETF Sector Weightings](https://site.financialmodelingprep.com/developer/docs/#ETF-Sector-Weightings)                     |  ✔   | EtfSectorWeightings   |
| [ETF Country Weightings](https://site.financialmodelingprep.com/developer/docs/#ETF-Country-Weightings)                   |  ✔   | EtfCountryWeightings  |
| [ETF Stock Exposure](https://site.financialmodelingprep.com/developer/docs/#ETF-Stock-Exposure)                           |  ✔   | EtfStockExposure      |
| [Form 13F]()                                                                                                              |      |                       |
| **STOCK LIST**                                                                                                            |      |                       |
| [Symbols List](https://site.financialmodelingprep.com/developer/docs/stock-market-quote-free-api)                         |  ✔   | StockList             |
| [Tradable Symbols List](https://site.financialmodelingprep.com/developer/docs/tradable-list-api)                          |  ✔   | StockList             |
| [ETF List](https://site.financialmodelingprep.com/developer/docs/etf-list-api)                                            |  ✔   | StockList             |
| **BULK AND BATCH**                                                                                                        |      |                       |
| [Batch Request Stock Companies Price]()                                                                                   |      | CompanyQuote          |
| **MARKET INDEXES**                                                                                                        |      |                       |
| --- premium endpoints---                                                                                                  |      |                       |
| **EURONEXT**                                                                                                              |      |                       |
| --- premium endpoints---                                                                                                  |      |                       |
| **TSX**                                                                                                                   |      |                       |
| --- premium endpoints---                                                                                                  |      |                       |
| CRYPTO                                                                                                                    |      |                       |
| --- premium endpoints---                                                                                                  |      |                       |
| FOREX                                                                                                                     |      |                       |
| --- premium endpoints---                                                                                                  |      |                       |
| COMMODITIES                                                                                                               |      |                       |
| --- premium endpoints---                                                                                                  |      |                       |
### Changelog
Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.
### Security
If you discover any security related issues, please email stalkerxxl@gmail.com instead of using the
issue tracker.
## Credits
- [kartulin](https://github.com/kartulin)
## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
