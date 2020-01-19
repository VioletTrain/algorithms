<?php

namespace Algorithms\UseCase;

use Algorithms\SystemInfo;

class TimeElapsedUseCase
{
    private SystemInfo $systemInfo;

    public const DESCRIPTION = 'Show time elapsed for current script';

    public function __construct(SystemInfo $systemInfo)
    {
        $this->systemInfo = $systemInfo;
    }

    public function timeElapsed(): int
    {
        return $this->systemInfo->timeElapsed();
    }
}