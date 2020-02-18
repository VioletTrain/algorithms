<?php

namespace Algorithms\UseCase;

use Algorithms\Boundary\IntArrayBoundary;

class PlusMinusUseCase
{
    public const DESCRIPTION = 'Count ratio of positive, negative, and 0 integers in n-array (Plus Minus)';

    public function countRatios(IntArrayBoundary $intArrayBoundary): array
    {
        $array = $intArrayBoundary->integers();

        $denominator = count($array);
        $positive = 0;
        $negative = 0;
        $zero = 0;

        foreach ($array as $integer) {
            if ($integer > 0) {
                $positive++;
            } elseif ($integer < 0) {
                $negative++;
            } else {
                $zero++;
            }
        }

        $ratios['positive'] = number_format($positive / $denominator, 6);
        $ratios['negative'] = number_format($negative / $denominator, 6);
        $ratios['zero'] = number_format($zero / $denominator, 6);

        return $ratios;
    }
}