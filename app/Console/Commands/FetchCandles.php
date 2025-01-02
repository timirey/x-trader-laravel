<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Timirey\XApi\Enums\Period;
use Timirey\XApi\Payloads\Data\ChartLastInfoRecord;
use Timirey\XApi\Responses\FetchCandlesResponse;

class FetchCandles extends Command
{
    protected $signature = 'broker:fetch-candles {symbol}';

    protected $description = 'This command allows to subscribe to candle streams for a specific symbol.';

    public function handle(): void
    {
        $symbol = $this->argument('symbol');

        $this->prepare($symbol);
        $this->subscribe($symbol);
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
    private function prepare(string $symbol): void
    {
        $chartLastInfoRecord = new ChartLastInfoRecord(Period::PERIOD_M1, now(), $symbol);

        broker()->client->getChartLastRequest($chartLastInfoRecord);
    }

    private function subscribe(string $symbol): void
    {
        $this->info("Subscribing to 1-minute candles for symbol: $symbol.");

        broker()->client->fetchCandles($symbol, function (FetchCandlesResponse $response) {
            $this->info("[{$response->candleStreamRecord->ctmString}] Price: {$response->candleStreamRecord->close}.");
        });
    }
}
