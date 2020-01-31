<?php

namespace Algorithms\UseCase;

use Algorithms\Boundary\IntBoundary;

class LargestDecentNumberUseCase
{
    public const DESCRIPTION = "Count largest decent number that has n digits (Largest Decent Number) 
     A Decent Number has the following properties:
            Its digits can only be 3's and/or 5's.
            The number of 3's it contains is divisible by 5.
            The number of 5's it contains is divisible by 3.
            It is the largest such number for its length.";

    public function largestDecentNumber(IntBoundary $intBoundary): string
    {
        $length = $intBoundary->integer();

        if (in_array($length, [1, 2, 4])) {
            return -1;
        }

        if ($length == 3) {
            return '555';
        }

        if ($length == 5) {
            return '33333';
        }

        if ($length == 10) {
            return str_repeat(3, 10);
        }

        for ($i = $length; $i > 0; $i--) {
            if ($i % 3 == 0) {
                $fives = $i;
                $threes = $length - $i;

                if ($threes % 5 === 0) {
                    return str_repeat(5, $fives) . str_repeat(3, $threes);
                }

                if ($threes === 0) {
                    return str_repeat(5, $fives);
                }
            }
        }

        return '-1';
    }
}