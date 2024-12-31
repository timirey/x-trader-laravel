<?php

namespace App\Services;

use App\Contracts\BrokerContract;
use Timirey\XApi\Client;
use Timirey\XApi\Enums\Host;

class XtbBrokerService implements BrokerContract
{
    protected Client $client;

    public function __construct()
    {
        $this->connect();
    }

    public function connect(): void
    {
        $userId = config('brokers.connections.xtb.user_id');
        $password = config('brokers.connections.xtb.password');
        $environment = config('brokers.connections.xtb.environment');

        $this->client = new Client($userId, $password, Host::from($environment));
    }
}
