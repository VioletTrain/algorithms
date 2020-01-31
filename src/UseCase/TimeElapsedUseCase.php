<?php

namespace Algorithms\UseCase;

use Algorithms\Boundary\IntBoundary;
use Algorithms\SystemInfo;

class TimeElapsedUseCase
{
    private SystemInfo $systemInfo;

    public const DESCRIPTION = 'Show time elapsed for current script';

    public function __construct(SystemInfo $systemInfo)
    {
        $this->systemInfo = $systemInfo;
    }

    public function timeElapsed(IntBoundary $intBoundary): string
    {
        $precision = $intBoundary->integer();

        return number_format($this->systemInfo->timeElapsed(), $precision);
    }
}