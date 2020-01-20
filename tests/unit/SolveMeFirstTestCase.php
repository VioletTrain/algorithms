<?php

use Algorithms\UseCase\SolveMeFirstUseCase;
use PHPUnit\Framework\TestCase;

class SolveMeFirstTestCase extends TestCase
{
    public function test_Sum_Adds_2Integers()
    {
        $solveMeFirst = new SolveMeFirstUseCase();

        $a = mt_rand(0, 100);
        $b = mt_rand(0, 100);

        $result = $solveMeFirst->sum($a, $b);

        $this->assertEquals($a + $b, $result);
    }
}