<?php

namespace Algorithms\UseCase;

use Algorithms\Boundary\IntBoundary;

class StaircaseUseCase
{
    public const DESCRIPTION = 'Build n-sized staircase aligned to right (Staircase)';

    public function build(IntBoundary $intBoundary): array
    {
        $size = $intBoundary->integer();
        $staircase = [];

        for ($i = $size; $i > 0; $i--) {
            $spaces = $i - 1;
            $lattices = $size - $spaces;

            $staircase[] = str_repeat(" ", $spaces) . str_repeat("#", $lattices);
        }

        return $staircase;
    }
}