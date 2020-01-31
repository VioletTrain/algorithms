<?php

use Algorithms\Boundary\IntBoundary;
use Algorithms\UseCase\LargestDecentNumberUseCase;
use PHPUnit\Framework\TestCase;

class LargestDecentNumberTest extends TestCase
{
    private LargestDecentNumberUseCase $useCase;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->useCase = new LargestDecentNumberUseCase();
    }

    /**
     * @throws \Algorithms\Exception\BoundaryException
     */
    public function test_Number_IsLargestDecentNumber_WhenSuitableLengthIsGiven()
    {
        $int = 25;

        $num = $this->useCase->largestDecentNumber(new IntBoundary($int));

        $this->assertEquals('5555555555555553333333333', $num);
    }

    /**
     * @throws \Algorithms\Exception\BoundaryException
     */
    public function test_Number_IsMinusOne_WhenUnsuitableLengthIsGiven()
    {
        $int = 1;

        $num = $this->useCase->largestDecentNumber(new IntBoundary($int));

        $this->assertEquals('-1', $num);
    }

    /**
     * @throws \Algorithms\Exception\BoundaryException
     */
    public function test_Number_IsLargestDecentNumber_WhenBigSuitableLengthIsGiven()
    {
        $int = 2147;

        $num = $this->useCase->largestDecentNumber(new IntBoundary($int));

        $this->assertEquals('55555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555533333', $num);
    }
}