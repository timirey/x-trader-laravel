<?php


use App\Contracts\BrokerContract;

if (!function_exists('broker')) {
    function broker(): BrokerContract
    {
        return app(BrokerContract::class);
    }
}
