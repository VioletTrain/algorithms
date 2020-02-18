<?php

namespace Algorithms\UseCase;

use Algorithms\Boundary\IntMatrix3x3Boundary;

class MagicSquareUseCase
{
    public const DESCRIPTION = "Calculate cost of transforming a 3x3 matrix to magic square.
     Cost is calculated by summing remainders of numbers that are changed and new numbers";

    public function calc3x3MagicSquareCost(IntMatrix3x3Boundary $boundary)
    {
        $matrixInline = [];

        foreach ($boundary->matrix() as $row) {
            foreach ($row as $element) {
                $matrixInline[] = $element;
            }
        }

        $all3x3MagicSquares = [
            [8, 1, 6, 3, 5, 7, 4, 9, 2],
            [6, 1, 8, 7, 5, 3, 2, 9, 4],
            [4, 9, 2, 3, 5, 7, 8, 1, 6],
            [2, 9, 4, 7, 5, 3, 6, 1, 8],
            [8, 3, 4, 1, 5, 9, 6, 7, 2],
            [4, 3, 8, 9, 5, 1, 2, 7, 6],
            [6, 7, 2, 1, 5, 9, 8, 3, 4],
            [2, 7, 6, 9, 5, 1, 4, 3, 8]
        ];

        $allSums = [];

        foreach ($all3x3MagicSquares as $square) {
            $abs = [];

            for ($i = 0; $i < 9; $i++) {
                $abs[] = abs($matrixInline[$i] - $square[$i]);
            }

            $allSums[] = array_sum($abs);
        }

        return min($allSums);
    }
}