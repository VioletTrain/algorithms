<?php

namespace Algorithms\UseCase;

class BirthdayCakeCandlesUseCase
{
    public const DESCRIPTION = 'Return number of max values in array (Birthday Cake Candles)';

    public function countTallestCandles(array $candles): int
    {
        $countedValues = array_count_values($candles);
        $maxKey = max(array_keys($countedValues));

        return $countedValues[$maxKey];
    }
}