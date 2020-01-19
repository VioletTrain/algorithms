<?php

namespace Algorithms\UseCase;

class SumUseCase
{
    public const DESCRIPTION = 'Count sum of 2 integers';

    public function sum(int $a, int $b): int
    {
        return $a + $b;
    }
}