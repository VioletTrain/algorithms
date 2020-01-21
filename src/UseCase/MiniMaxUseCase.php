<?php

namespace Algorithms\UseCase;

class MiniMaxUseCase
{
    public const DESCRIPTION = 'Return array of min and max sums of 4 integers out of 5 (Mini-Max)';

    public function countMiniMaxSums(array $integers): array
    {
        $sortedIntegers = $integers;
        sort($sortedIntegers);

        return [
            array_sum(array_slice($sortedIntegers, 0, 4)),
            array_sum(array_slice($sortedIntegers, 1))
        ];
    }
}