<?php

namespace Algorithms\UseCase;

class StaircaseUseCase
{
    public const DESCRIPTION = 'Build n-sized staircase aligned to right';

    public function build(int $size): array
    {
        $staircase = [];

        for ($i = $size; $i > 0; $i--) {
            $spaces = $i - 1;
            $lattices = $size - $spaces;

            $staircase[] = str_repeat(" ", $spaces) . str_repeat("#", $lattices);
        }

        return $staircase;
    }
}