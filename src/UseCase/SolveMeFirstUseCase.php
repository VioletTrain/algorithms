<?php

namespace Algorithms\UseCase;

use Algorithms\Boundary\IntBoundary;

class SolveMeFirstUseCase
{
    public const DESCRIPTION = 'Count sum of 2 integers (Solve Me First)';

    public function sum(IntBoundary $boundaryA, IntBoundary $boundaryB): int
    {
        return $boundaryA->integer() + $boundaryB->integer();
    }
}