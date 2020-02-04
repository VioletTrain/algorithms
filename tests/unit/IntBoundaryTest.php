<?php

use Algorithms\Boundary\IntBoundary;
use Algorithms\Exception\BoundaryException;
use PHPUnit\Framework\TestCase;

class IntBoundaryTest extends TestCase
{
    /**
     * @throws BoundaryException
     */
    public function test_IntBoundary_ValidatesAndReturnsInt_WhenIntIsPassed()
    {
        $intBoundary = new IntBoundary(5);

        $int = $intBoundary->integer();

        $this->assertEquals(5, $int);
    }

    /**
     * @throws BoundaryException
     */
    public function test_IntBoundary_ThrowsBoundaryException_WhenNullIsPassed()
    {
        $this->expectException(BoundaryException::class);

        $intBoundary = new IntBoundary(null);
    }

    /**
     * @throws BoundaryException
     */
    public function test_IntBoundary_ThrowsBoundaryException_WhenArrayIsPassed()
    {
        $this->expectException(BoundaryException::class);

        $intBoundary = new IntBoundary(['test', 'test']);
    }

    /**
     * @throws BoundaryException
     */
    public function test_IntBoundary_ThrowsBoundaryException_WhenNonNumericStringIsPassed()
    {
        $this->expectException(BoundaryException::class);

        $intBoundary = new IntBoundary('dvsevr');
    }

    /**
     * @throws BoundaryException
     */
    public function test_IntBoundary_ThrowsBoundaryException_WhenClosureIsPassed()
    {
        $this->expectException(BoundaryException::class);

        $intBoundary = new IntBoundary(function(){});
    }
}