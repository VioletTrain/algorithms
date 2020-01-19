<?php

namespace Anso\Framework\Console\Command;

use Algorithms\UseCase\MemoryUsageUseCase;
use Anso\Framework\Console\Contract\Command;

class MemoryCommand implements Command
{
    private MemoryUsageUseCase $memoryUsageUseCase;

    public function __construct(MemoryUsageUseCase $memoryUsageUseCase)
    {
        $this->memoryUsageUseCase = $memoryUsageUseCase;
    }

    public function execute(): string
    {
        $output = 'Memory usage: ' . $this->memoryUsageUseCase->memoryUsage() . "\n";

        return $output;
    }

    public static function description(): string
    {
        return MemoryUsageUseCase::DESCRIPTION;
    }
}