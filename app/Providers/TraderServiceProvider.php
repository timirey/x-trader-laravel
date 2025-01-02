<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Timirey\Trader\TraderService;

class TraderServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('trader', TraderService::class);
    }
}
