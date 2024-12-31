<?php

use App\Contracts\BrokerContract;
use Timirey\Trader\TraderInterface;

if (! function_exists('broker')) {
    function broker(): BrokerContract
    {
        return app(BrokerContract::class);
    }
}

if (! function_exists('trader')) {
    function trader(): TraderInterface
    {
        return app(TraderInterface::class);
    }
}
