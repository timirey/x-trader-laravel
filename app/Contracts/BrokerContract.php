<?php

namespace App\Contracts;

interface BrokerContract
{
    public function connect(): void;

    public function fetchCandles(string $symbol, callable $callback): void;
}
