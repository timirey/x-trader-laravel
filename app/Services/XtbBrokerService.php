<?php

namespace App\Services;

use App\Contracts\BrokerContract;
use Timirey\XApi\Client;
use Timirey\XApi\Enums\Host;
use Timirey\XApi\Enums\Period;
use Timirey\XApi\Payloads\Data\ChartLastInfoRecord;
use Timirey\XApi\Responses\FetchCandlesResponse;

class XtbBrokerService implements BrokerContract
{
    protected Client $client;

    public function __construct()
    {
        $this->connect();
    }

    public function connect(): void
    {
        $userId = config('brokers.connections.xtb.user_id');
        $password = config('brokers.connections.xtb.password');
        $environment = config('brokers.connections.xtb.environment');

        $this->client = new Client($userId, $password, Host::from($environment));
    }

    /**
     * Subscribes to the candle stream for a given symbol.
     *
     * Note: To ensure a successful subscription to the candle stream,
     * a price history request must be sent first. This initializes the
     * necessary data context for the stream.
     *
     * For more details, refer to the documentation:
     *
     * @see https://github.com/timirey/xapi-php/blob/main/README.md#fetchcandles-getcandles
     */
    public function fetchCandles(string $symbol, callable $callback): void
    {
        $chartLastInfoRecord = new ChartLastInfoRecord(Period::PERIOD_M1, now(), $symbol);

        $this->client->getChartLastRequest($chartLastInfoRecord);

        $this->client->fetchCandles($symbol, function (FetchCandlesResponse $response) use ($callback) {
            $callback($response);
        });
    }
}
