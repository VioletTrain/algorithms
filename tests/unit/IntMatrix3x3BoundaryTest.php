<?php

namespace Tests\Unit;

use Algorithms\Boundary\IntMatrix3x3Boundary;
use Algorithms\Exception\BoundaryException;
use PHPUnit\Framework\TestCase;

class IntMatrix3x3BoundaryTest extends TestCase
{
    /**
     * @throws BoundaryException
     */
    public function test_Boundary_ValidatesAndReturnsMatrix_When3x3IntMatrixIsGiven()
    {
        $matrix = [
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ];

        $boundary = new IntMatrix3x3Boundary($matrix);

        $validatedMatrix = $boundary->matrix();

        $this->assertEquals($matrix, $validatedMatrix);
    }

    /**
     * @throws BoundaryException
     */
    public function test_Boundary_ThrowsBoundaryException_WhenNotIntMatrixIsGiven()
    {
        $matrix = [
            [1, 2, 'test'],
            [4, 5, 6],
            [7, 8, 9]
        ];

        $this->expectException(BoundaryException::class);

        $boundary = new IntMatrix3x3Boundary($matrix);
    }

    /**
     * @throws BoundaryException
     */
    public function test_Boundary_ThrowsBoundaryException_When4x3MatrixIsGiven()
    {
        $matrix = [
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9],
            [1, 2, 3]
        ];

        $this->expectException(BoundaryException::class);

        $boundary = new IntMatrix3x3Boundary($matrix);
    }

    /**
     * @throws BoundaryException
     */
    public function test_Boundary_ThrowsBoundaryException_When3x4MatrixIsGiven()
    {
        $matrix = [
            [1, 2, 3, 4],
            [4, 5, 6],
            [7, 8, 9],
        ];

        $this->expectException(BoundaryException::class);

        $boundary = new IntMatrix3x3Boundary($matrix);
    }

    /**
     * @throws BoundaryException
     */
    public function test_Boundary_ThrowsBoundaryException_When6x6MatrixIsGiven()
    {
        $matrix = [
            [1, 2, 3, 4, 5 ,6],
            [4, 5, 6],
            [7, 8, 9],
            [7, 8, 9],
            [7, 8, 9],
            [7, 8, 9],
        ];

        $this->expectException(BoundaryException::class);

        $boundary = new IntMatrix3x3Boundary($matrix);
    }
}