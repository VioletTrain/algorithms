<?php

namespace Algorithms\UseCase;

use Algorithms\Boundary\TimeBoundary;

class TimeConversionUseCase
{
    public const DESCRIPTION = 'Convert time from 12-hours to 24-hours format (Time Converter)';

    public function covertTimeFromRegularToMilitary(TimeBoundary $timeBoundary)
    {
        $regularTime = $timeBoundary->time();

        return $regularTime->military();
    }
}