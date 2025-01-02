<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Trader extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'trader';
    }
}
