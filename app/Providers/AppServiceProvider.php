<?php

namespace App\Providers;

use App\Contracts\BrokerContract;
use App\Services\BrokerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(BrokerContract::class, BrokerService::class);
    }
}
