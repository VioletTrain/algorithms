<?php

namespace Algorithms;

class Math
{
    public static function sum($a, $b)
    {
        return $a + $b;
    }

    public static function countRatio($integer, $denominator, $precision = 6)
    {
        return number_format($integer / $denominator, $precision);
    }
}