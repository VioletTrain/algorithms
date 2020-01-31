<?php

use Algorithms\Boundary\IntBoundary;
use Algorithms\UseCase\StaircaseUseCase;
use PHPUnit\Framework\TestCase;

class StaircaseTest extends TestCase
{
    private $staircase;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->staircase = new StaircaseUseCase();
    }

    /**
     * @throws \Algorithms\Exception\BoundaryException
     */
    public function test_Staircase_ReturnsStaircaseOfNSize_whenNIsPositiveInteger()
    {
        $size = 5;

        $stairCase = $this->staircase->build(new IntBoundary($size));

        $this->assertEquals([
            '    #',
            '   ##',
            '  ###',
            ' ####',
            '#####',
        ], $stairCase);
    }

    /**
     * @throws \Algorithms\Exception\BoundaryException
     */
    public function test_Staircase_ReturnsEmptyStair_whenNIsNegativeInteger()
    {
        $size = -5;

        $stairCase = $this->staircase->build(new IntBoundary($size));

        $this->assertEquals([], $stairCase);
    }

    /**
     * @throws \Algorithms\Exception\BoundaryException
     */
    public function test_Staircase_ReturnsEmptyStair_whenNIsZero()
    {
        $size = 0;

        $stairCase = $this->staircase->build(new IntBoundary($size));

        $this->assertEquals([], $stairCase);
    }
}