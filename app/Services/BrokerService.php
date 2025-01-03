<?php

namespace App\Services;

use Timirey\XApi\Client;
use Timirey\XApi\Enums\Host;

readonly class BrokerService
{
    public Client $client;

    public function __construct()
    {
        $this->connect();
    }

    private function connect(): void
    {
        $userId = config('broker.user_id');
        $password = config('broker.password');
        $environment = config('broker.environment');

        $this->client = new Client($userId, $password, Host::from($environment));
    }
}
