<?php

use Algorithms\Boundary\TimeBoundary;
use Algorithms\Exception\BoundaryException;
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

    /**
     * @throws BoundaryException
     */
    public function test_Convert_ConvertsTimeFrom12HFormatTo24H_WhenInputIs12HDateString()
    {
        $regularTime = '04:59:59AM';

        $militaryTime = $this->useCase->covertTimeFromRegularToMilitary(new TimeBoundary($regularTime));

        $this->assertEquals('04:59:59', $militaryTime);
    }

    /**
     * @throws BoundaryException
     */
    public function test_Convert_ThrowsInvalidTimeException_WhenHoursFormatIsInvalid()
    {
        $this->expectException(BoundaryException::class);
        $regularTime = '13:00:59AM';

        $boundary = new TimeBoundary($regularTime);
    }

    /**
     * @throws BoundaryException
     */
    public function test_Convert_ThrowsInvalidTimeException_WhenMinutesFormatIsInvalid()
    {
        $this->expectException(BoundaryException::class);
        $regularTime = '12:-1:59AM';

        $boundary = new TimeBoundary($regularTime);
    }

    /**
     * @throws BoundaryException
     */
    public function test_Convert_ThrowsInvalidTimeException_WhenSecondsFormatIsInvalid()
    {
        $this->expectException(BoundaryException::class);
        $regularTime = '12:02:60AM';

        $boundary = new TimeBoundary($regularTime);
    }

    /**
     * @throws BoundaryException
     */
    public function test_Convert_ThrowsInvalidTimeException_WhenDayPeriodFormatIsInvalid()
    {
        $this->expectException(BoundaryException::class);
        $regularTime = '12:02:59km';

        $boundary = new TimeBoundary($regularTime);
    }
}