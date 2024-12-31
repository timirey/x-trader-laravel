<?php

namespace App\Factories;

use App\Contracts\BrokerContract;
use Exception;

class BrokerFactory
{
    public static function create(): BrokerContract
    {
        $broker = config('brokers.default');

        $config = config("brokers.connections.$broker");

        if (! isset($config['service'])) {
            throw new Exception("No service class defined for broker: $broker");
        }

        $service = $config['service'];

        if (! class_exists($service) || ! is_subclass_of($service, BrokerContract::class)) {
            throw new Exception("Invalid service class: $service");
        }

        return app($service);
    }
}
