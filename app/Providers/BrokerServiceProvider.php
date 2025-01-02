<?php

namespace App\Providers;

use App\Services\BrokerService;
use Illuminate\Support\ServiceProvider;

class BrokerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('broker', static fn () => new BrokerService);
    }
}
