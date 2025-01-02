<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Timirey\XApi\Responses\FetchCandlesResponse;

class FetchCandles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'broker:fetch-candles {symbol}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command allows to subscribe to candle streams for a specific symbol.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $symbol = $this->argument('symbol');

        $this->info("Subscribing to 1-minute candles for symbol: $symbol.");

        broker()->fetchCandles($symbol, function (FetchCandlesResponse $response) {
            $this->info("[{$response->candleStreamRecord->ctmString}] Price: {$response->candleStreamRecord->close}.");
        });
    }
}
