<?php

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\Exception\BoundaryException;
use PHPUnit\Framework\TestCase;

class IntArrayBoundaryTest extends TestCase
{
    /**
     * @throws BoundaryException
     */
    public function test_IntArrayBoundary_ValidatesAndReturnsInt_WhenIntIsPassed()
    {
        $intArrayBoundary = new IntArrayBoundary([1, 2, 3]);

        $int = $intArrayBoundary->integers();

        $this->assertEquals([1, 2, 3], $int);
    }

    /**
     * @throws BoundaryException
     */
    public function test_IntArrayBoundary_ThrowsBoundaryException_WhenNullIsPassed()
    {
        $this->expectException(BoundaryException::class);

        $intArrayBoundary = new IntArrayBoundary(null);
    }

    /**
     * @throws BoundaryException
     */
    public function test_IntArrayBoundary_ThrowsBoundaryException_WhenNonNumericArrayIsPassed()
    {
        $this->expectException(BoundaryException::class);

        $intArrayBoundary = new IntArrayBoundary(['test', 'test']);
    }

    /**
     * @throws BoundaryException
     */
    public function test_IntArrayBoundary_ThrowsBoundaryException_WhenStringIsPassed()
    {
        $this->expectException(BoundaryException::class);

        $intArrayBoundary = new IntArrayBoundary('dvsevr');
    }

    /**
     * @throws BoundaryException
     */
    public function test_IntArrayBoundary_ThrowsBoundaryException_WhenClosureIsPassed()
    {
        $this->expectException(BoundaryException::class);

        $intArrayBoundary = new IntArrayBoundary(function(){});
    }

    /**
     * @throws BoundaryException
     */
    public function test_IntArrayBoundary_ThrowsBoundaryException_WhenIntIsPassed()
    {
        $this->expectException(BoundaryException::class);

        $intArrayBoundary = new IntArrayBoundary(1);
    }

    /**
     * @throws BoundaryException
     */
    public function test_IntArrayBoundary_ThrowsBoundaryException_WhenEmptyArrayIsPassed()
    {
        $this->expectException(BoundaryException::class);

        $intArrayBoundary = new IntArrayBoundary([]);
    }
}