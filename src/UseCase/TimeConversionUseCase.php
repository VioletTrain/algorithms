<?php

namespace Algorithms\UseCase;

use Algorithms\Time;

class TimeConversionUseCase
{
    public const DESCRIPTION = 'Convert time from 12-hours to 24-hours format';

    public function covertTimeFromRegularToMilitary(string $regularTime)
    {
        $time = new Time($regularTime);

        return $time->military();
    }
}