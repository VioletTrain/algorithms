<?php

use Algorithms\Boundary\TimeBoundary;
use Algorithms\Exception\InvalidTimeFormatException;
use Algorithms\UseCase\TimeConversionUseCase;
use PHPUnit\Framework\TestCase;

class TimeConversionTest extends TestCase
{
    private TimeBoundary $timeBoundary;
    private TimeConversionUseCase $useCase;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->timeBoundary = new TimeBoundary();
        $this->useCase = new TimeConversionUseCase();
    }

    /**
     * @throws InvalidTimeFormatException
     */
    public function test_Convert_ConvertsTimeFrom12HFormatTo24H_WhenInputIs12HDateString()
    {
        $regularTime = '04:59:59AM';

        $time = $this->timeBoundary->convert($regularTime);
        $militaryTime = $this->useCase->covertTimeFromRegularToMilitary($time);

        $this->assertEquals('04:59:59', $militaryTime);
    }

    /**
     * @throws InvalidTimeFormatException
     */
    public function test_Convert_ThrowsInvalidTimeException_WhenHoursFormatIsInvalid()
    {
        $this->expectException(InvalidTimeFormatException::class);
        $regularTime = '13:00:59AM';

        $this->timeBoundary->convert($regularTime);
    }

    /**
     * @throws InvalidTimeFormatException
     */
    public function test_Convert_ThrowsInvalidTimeException_WhenMinutesFormatIsInvalid()
    {
        $this->expectException(InvalidTimeFormatException::class);
        $regularTime = '12:-1:59AM';

        $this->timeBoundary->convert($regularTime);
    }

    /**
     * @throws InvalidTimeFormatException
     */
    public function test_Convert_ThrowsInvalidTimeException_WhenSecondsFormatIsInvalid()
    {
        $this->expectException(InvalidTimeFormatException::class);
        $regularTime = '12:02:60AM';

        $this->timeBoundary->convert($regularTime);
    }

    /**
     * @throws InvalidTimeFormatException
     */
    public function test_Convert_ThrowsInvalidTimeException_WhenDayPeriodFormatIsInvalid()
    {
        $this->expectException(InvalidTimeFormatException::class);
        $regularTime = '12:02:59km';

        $this->timeBoundary->convert($regularTime);
    }
}