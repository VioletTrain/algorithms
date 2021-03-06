<?php

namespace Algorithms\UseCase;

use Algorithms\SystemInfo;

class MemoryUsageUseCase
{
    private SystemInfo $systemInfo;

    public const DESCRIPTION = 'Show current memory usage';

    public function __construct(SystemInfo $systemInfo)
    {
        $this->systemInfo = $systemInfo;
    }

    public function memoryUsage(): int
    {
        return $this->systemInfo->memoryUsage();
    }
}