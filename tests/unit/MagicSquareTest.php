<?php

namespace Tests\Unit;

use Algorithms\Boundary\IntMatrix3x3Boundary;
use Algorithms\Exception\BoundaryException;
use Algorithms\UseCase\MagicSquareUseCase;
use PHPUnit\Framework\TestCase;

class MagicSquareTest extends TestCase
{
    private $magicSquare;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->magicSquare = new MagicSquareUseCase();
    }

    /**
     * @throws BoundaryException
     */
    public function test_MagicSquareUseCase_CalculatesCost_WhenFirst3x3IntMatrixIsGiven()
    {
        $matrix = [
            [9, 8, 9],
            [1, 6, 7],
            [8, 9, 7]
        ];

        $cost = $this->magicSquare->calc3x3MagicSquareCost(new IntMatrix3x3Boundary($matrix));

        $this->assertEquals(23, $cost);
    }

    /**
     * @throws BoundaryException
     */
    public function test_MagicSquareUseCase_CalculatesCost_WhenSecond3x3IntMatrixIsGiven()
    {
        $matrix = [
            [4, 8, 2],
            [4, 5, 7],
            [6, 1, 6]
        ];

        $cost = $this->magicSquare->calc3x3MagicSquareCost(new IntMatrix3x3Boundary($matrix));

        $this->assertEquals(4, $cost);
    }

    /**
     * @throws BoundaryException
     */
    public function test_MagicSquareUseCase_CalculatesCost_WhenThird3x3IntMatrixIsGiven()
    {
        $matrix = [
            [4, 6, 6],
            [2, 4, 1],
            [8, 9, 8]
        ];

        $cost = $this->magicSquare->calc3x3MagicSquareCost(new IntMatrix3x3Boundary($matrix));

        $this->assertEquals(21, $cost);
    }
}
