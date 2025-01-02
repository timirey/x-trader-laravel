<?php

use App\Services\BrokerService;
use Timirey\Trader\TraderInterface;

if (! function_exists('broker')) {
    function broker(): BrokerService
    {
        return app('broker');
    }
}

if (! function_exists('trader')) {
    function trader(): TraderInterface
    {
        return app(TraderInterface::class);
    }
}
