<?php

namespace Algorithms\UseCase;

use Algorithms\Time;

class TimeConversionUseCase
{
    public const DESCRIPTION = 'Convert time from 12-hours to 24-hours format (Time Converter)';

    public function covertTimeFromRegularToMilitary(Time $regularTime)
    {
        return $regularTime->military();
    }
}