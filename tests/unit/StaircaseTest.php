<?php

use Algorithms\Boundary\IntBoundary;
use Algorithms\Exception\BoundaryException;
use Algorithms\UseCase\StaircaseUseCase;
use PHPUnit\Framework\TestCase;

class StaircaseTest extends TestCase
{
    private $useCase;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->useCase = new StaircaseUseCase();
    }

    /**
     * @throws BoundaryException
     */
    public function test_Staircase_ReturnsStaircaseOfNSize_whenNIsPositiveInteger()
    {
        $size = 5;

        $stairCase = $this->useCase->build(new IntBoundary($size));

        $this->assertEquals([
            '    #',
            '   ##',
            '  ###',
            ' ####',
            '#####',
        ], $stairCase);
    }

    /**
     * @throws BoundaryException
     */
    public function test_Staircase_ReturnsEmptyStair_whenNIsNegativeInteger()
    {
        $size = -5;

        $stairCase = $this->useCase->build(new IntBoundary($size));

        $this->assertEquals([], $stairCase);
    }

    /**
     * @throws BoundaryException
     */
    public function test_Staircase_Throws_whenNIsZero()
    {
        $size = 0;

        $stairCase = $this->useCase->build(new IntBoundary($size));

        $this->assertEquals([], $stairCase);
    }
}