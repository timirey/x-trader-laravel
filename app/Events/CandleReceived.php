<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Timirey\XApi\Responses\Data\CandleStreamRecord;

class CandleReceived
{
    use Dispatchable;

    public function __construct(
        public CandleStreamRecord $record,
    ) {}
}
