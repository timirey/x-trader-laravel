<?php

use App\Services\BrokerService;
use Timirey\Trader\TraderService;

if (! function_exists('broker')) {
    function broker(): BrokerService
    {
        return app('broker');
    }
}

if (! function_exists('trader')) {
    function trader(): TraderService
    {
        return app('trader');
    }
}
