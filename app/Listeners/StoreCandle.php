<?php

namespace App\Listeners;

use App\Events\CandleReceived;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Redis;
use Timirey\XApi\Responses\Data\CandleStreamRecord;

class StoreCandle implements ShouldQueue
{
    public function handle(CandleReceived $event): void
    {
        $key = "candles:{$event->record->symbol}";

        $this->store($key, $event->record);
        $this->preserve($key, 60);
    }

    private function store(string $key, CandleStreamRecord $record): void
    {
        Redis::lPush($key, [
            'close' => $record->close,
            'high' => $record->high,
            'low' => $record->low,
        ]);
    }

    private function preserve(string $key, int $quantity): void
    {
        if ($quantity <= 0) {
            throw new Exception('Record quantity should be greater than 0.');
        }

        Redis::lTrim($key, 0, $quantity - 1);
    }
}
