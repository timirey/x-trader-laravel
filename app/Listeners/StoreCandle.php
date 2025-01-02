<?php

namespace App\Listeners;

use App\Events\CandleReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Redis;

class StoreCandle implements ShouldQueue
{
    public function handle(CandleReceived $event): void
    {
        $key = "candles:{$event->record->symbol}";

        Redis::lPush($key, json_encode([
            'close' => $event->record->close,
            'high' => $event->record->high,
            'low' => $event->record->low,
        ]));
    }
}
