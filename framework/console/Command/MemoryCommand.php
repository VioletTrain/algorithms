<?php

namespace Anso\Framework\Console\Command;

use Algorithms\UseCase\MemoryUsageUseCase;

class MemoryCommand
{
    private MemoryUsageUseCase $memoryUsageUseCase;

    public function __construct(MemoryUsageUseCase $memoryUsageUseCase)
    {
        $this->memoryUsageUseCase = $memoryUsageUseCase;
    }

    public function execute()
    {
        $output = 'Memory usage: ' . $this->memoryUsageUseCase->memoryUsage() . "\n";

        return $output;
    }
}