<?php

namespace Kartulin\FmpApiSdk\Endpoints;

/**
 * request to /$type/list
 * @link https://site.financialmodelingprep.com/developer/docs/#Symbols-List
 */
final class StockList extends AbstractEndpoint
{
    protected string $endpoint;
    protected string $apiVersion = 'v3';
    protected ?string $symbol = 'list';
    private const VALID_TYPE_LIST = [
        'stock',
        'available-traded',
        'etf',
    ];

    public function __invoke(string $type): StockList
    {
        $this->setList($type);
        return $this;
    }


    private function setList(string $type)
    {
        if (in_array($type, self::VALID_TYPE_LIST)) {
            $this->endpoint = $type;
        } else {
            throw new \InvalidArgumentException(
                'Error! Allowed list: '.implode(' | ', self::VALID_TYPE_LIST)
            );
        }
    }
}