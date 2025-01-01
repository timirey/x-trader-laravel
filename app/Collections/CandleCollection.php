<?php

namespace App\Collections;

use Illuminate\Support\Collection;

class CandleCollection extends Collection
{
    public function closes(string $key = 'close'): array
    {
        return array_column($this->all(), $key);
    }

    public function highs(string $key = 'high'): array
    {
        return array_column($this->all(), $key);
    }

    public function lows(string $key = 'low'): array
    {
        return array_column($this->all(), $key);
    }
}
