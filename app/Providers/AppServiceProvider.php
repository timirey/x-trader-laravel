<?php

namespace App\Providers;

use App\Services\BrokerService;
use Illuminate\Support\ServiceProvider;
use Timirey\Trader\TraderService;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('broker', static fn () => new BrokerService);

        $this->app->bind('trader', TraderService::class);
    }
}
