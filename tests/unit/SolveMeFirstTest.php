<?php

use Algorithms\Boundary\IntBoundary;
use Algorithms\Exception\BoundaryException;
use Algorithms\UseCase\SolveMeFirstUseCase;
use PHPUnit\Framework\TestCase;

class SolveMeFirstTest extends TestCase
{

    /**
     * @throws BoundaryException
     */
    public function test_Sum_Adds_2Integers()
    {
        $solveMeFirst = new SolveMeFirstUseCase();

        $a = mt_rand(0, 100);
        $b = mt_rand(0, 100);

        $result = $solveMeFirst->sum(new IntBoundary($a), new IntBoundary($b));

        $this->assertEquals($a + $b, $result);
    }
}