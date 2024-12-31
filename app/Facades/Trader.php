<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use Timirey\Trader\TraderInterface;

class Trader extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return TraderInterface::class;
    }
}
