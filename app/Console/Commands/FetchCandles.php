<?php

namespace App\Console\Commands;

use App\Events\CandleReceived;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
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

        $this->flush($symbol);
        $this->prepare($symbol);
        $this->subscribe($symbol);
    }

    private function flush(string $symbol): void
    {
        $key = "candles:{$symbol}";

        Redis::del($key);

        $this->info("All data has been removed for {$symbol}.");
    }

    /**
     * To ensure a successful subscription to the candle stream, a price history request must be sent first.
     * This initializes the necessary data context for the stream.
     *
     * @see https://github.com/timirey/xapi-php/blob/main/README.md#fetchcandles-getcandles
     */
    private function prepare(string $symbol): void
    {
        $chartLastInfoRecord = new ChartLastInfoRecord(Period::PERIOD_M1, now(), $symbol);

        broker()->client->getChartLastRequest($chartLastInfoRecord);

        $this->info("Prepare chart history data for {$symbol}.");
    }

    private function subscribe(string $symbol): void
    {
        $command = $this;

        $command->info("Waiting for candles within 1-minute period for {$symbol}.");

        broker()->client->fetchCandles($symbol, static function (FetchCandlesResponse $response) use ($command) {
            $record = $response->candleStreamRecord;

            $command->info("[{$record->ctmString}] New candle is received for {$record->symbol} at price {$record->close}.");

            CandleReceived::dispatch($response->candleStreamRecord);
        });
    }
}
