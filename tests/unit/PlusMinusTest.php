<?php

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

    public function test_CountRatios_CountsRatios_whenArrayOfIntegersIsGiven()
    {
        $result = $this->plusMinus->countRatios([1, 3, 3, 0, -5]);

        $this->assertSame([
            'positive' => "0.600000",
            'negative' => "0.200000",
            'zero' => "0.200000"
        ], $result);
    }

    public function test_CountRatios_CountsStringsAsZeros_WhenArrayOfIntegersAndStringsIsGiven()
    {
        $result = $this->plusMinus->countRatios([1, 3, 'sdfsdf', 0, -5]);

        $this->assertSame([
            'positive' => "0.400000",
            'negative' => "0.200000",
            'zero' => "0.400000"
        ], $result);
    }
}
