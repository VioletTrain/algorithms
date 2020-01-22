<?php

use Algorithms\UseCase\TimeConversionUseCase;
use PHPUnit\Framework\TestCase;

class TimeConversionTest extends TestCase
{
    private TimeConversionUseCase $useCase;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->useCase = new TimeConversionUseCase();
    }

    public function test_Convert_ConvertsTimeFrom12HFormatTo24H_WhenInputIs12HDateString()
    {
        $regularTime = '04:59:59AM';

        $militaryTime = $this->useCase->covertTimeFromRegularToMilitary($regularTime);

        $this->assertEquals('04:59:59', $militaryTime);
    }
}