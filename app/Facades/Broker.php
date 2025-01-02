<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Broker extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'broker';
    }
}
