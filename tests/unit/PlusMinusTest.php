<?php

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\UseCase\PlusMinusUseCase;
use PHPUnit\Framework\TestCase;

class PlusMinusTest extends TestCase
{
    private $plusMinus;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->plusMinus = new PlusMinusUseCase();
    }

    /**
     * @throws \Algorithms\Exception\BoundaryException
     */
    public function test_CountRatios_CountsRatios_whenArrayOfIntegersIsGiven()
    {
        $result = $this->plusMinus->countRatios(new IntArrayBoundary([1, 3, 3, 0, -5]));

        $this->assertSame([
            'positive' => "0.600000",
            'negative' => "0.200000",
            'zero' => "0.200000"
        ], $result);
    }
}
