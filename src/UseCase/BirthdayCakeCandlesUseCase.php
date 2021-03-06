<?php

namespace Algorithms\UseCase;

use Algorithms\Boundary\IntArrayBoundary;

class BirthdayCakeCandlesUseCase
{
    public const DESCRIPTION = 'Return number of max values in array (Birthday Cake Candles)';

    public function countTallestCandles(IntArrayBoundary $intArrayBoundary): int
    {
        $countedValues = array_count_values($intArrayBoundary->integers());
        $maxKey = max(array_keys($countedValues));

        return $countedValues[$maxKey];
    }
}