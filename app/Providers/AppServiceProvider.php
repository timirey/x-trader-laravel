<?php

namespace App\Providers;

use App\Contracts\BrokerContract;
use App\Factories\BrokerFactory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(BrokerContract::class, static fn () => BrokerFactory::create());
    }
}
