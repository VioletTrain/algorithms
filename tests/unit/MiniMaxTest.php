<?php

use Algorithms\UseCase\MiniMaxUseCase;
use PHPUnit\Framework\TestCase;

class MiniMaxTest extends TestCase
{
    private $miniMax;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->miniMax = new MiniMaxUseCase();
    }

    public function test_CountSums_ReturnsMinAndMaxSums_WhenArrayOfIntegersIsGiven()
    {
        $integers = [1, 3, 5, 7, 9];

        $result = $this->miniMax->countMiniMaxSums($integers);

        $this->assertEquals([
            16, 24
        ], $result);
    }

    public function test_CountSums_ReturnsMinAndMaxSums_WhenArrayOfIntegersAndStringsIsGiven()
    {
        $integers = [1, 0, 5, 0, 9];

        $result = $this->miniMax->countMiniMaxSums($integers);

        $this->assertEquals([
            6, 15
        ], $result);
    }
}