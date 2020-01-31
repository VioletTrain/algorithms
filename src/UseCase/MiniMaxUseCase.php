<?php

namespace Algorithms\UseCase;

use Algorithms\Boundary\IntArrayBoundary;

class MiniMaxUseCase
{
    public const DESCRIPTION = 'Return array of min and max sums of n-1 integers out of n (Mini-Max)';

    public function countMiniMaxSums(IntArrayBoundary $intArrayBoundary): array
    {
        $sortedIntegers = $intArrayBoundary->integers();
        $length = count($sortedIntegers);
        sort($sortedIntegers);

        return [
            array_sum(array_slice($sortedIntegers, 0, $length - 1)),
            array_sum(array_slice($sortedIntegers, 1))
        ];
    }
}