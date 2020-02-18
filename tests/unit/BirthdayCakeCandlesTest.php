<?php

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\Exception\BoundaryException;
use Algorithms\UseCase\BirthdayCakeCandlesUseCase;
use PHPUnit\Framework\TestCase;

class BirthdayCakeCandlesTest extends TestCase
{
    private $useCase;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->useCase = new BirthdayCakeCandlesUseCase();
    }

    /**
     * @throws BoundaryException
     */
    public function test_countTallestCandles_ReturnsTallestCandles_WhenArrayOfIntegersIsGiven()
    {
        $candles = [4, 5, 5, 5, 9, 9];

        $result = $this->useCase->countTallestCandles(new IntArrayBoundary($candles));

        $this->assertEquals(2, $result);
    }
}