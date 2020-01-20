<?php

namespace Algorithms\UseCase;

use Algorithms\Math;

class PlusMinusUseCase
{
    public const DESCRIPTION = 'Count ratio of positive, negative, and 0 integers in n-array (Plus Minus)';

    public function countRatios(array $array): array
    {
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

        $ratios['positive'] = Math::countRatio($positive, $denominator);
        $ratios['negative'] = Math::countRatio($negative, $denominator);
        $ratios['zero'] = Math::countRatio($zero, $denominator);

        return $ratios;
    }
}