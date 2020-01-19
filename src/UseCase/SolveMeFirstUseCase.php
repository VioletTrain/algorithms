<?php

namespace Algorithms\UseCase;

class SolveMeFirstUseCase
{
    public const DESCRIPTION = 'Count sum of 2 integers (Solve Me First)';

    public function sum(int $a, int $b): int
    {
        return $a + $b;
    }
}