<?php

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

    public function test_Number_IsLargestDecentNumber_WhenSuitableLengthIsGiven()
    {
        $int = 25;

        $num = $this->useCase->largestDecentNumber($int);

        $this->assertEquals('5555555555555553333333333', $num);
    }
}