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
        $userId = config('services.xtb.user_id');
        $password = config('services.xtb.password');
        $environment = config('services.xtb.environment');

        $this->client = new Client($userId, $password, Host::from($environment));
    }
}
