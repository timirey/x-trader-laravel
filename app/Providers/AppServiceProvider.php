<?php

namespace App\Providers;

use App\Contracts\BrokerContract;
use App\Factories\BrokerFactory;
use Illuminate\Support\ServiceProvider;
use Timirey\Trader\TraderInterface;
use Timirey\Trader\TraderService;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(BrokerContract::class, static fn () => BrokerFactory::create());

        $this->app->bind(TraderInterface::class, TraderService::class);
    }
}
