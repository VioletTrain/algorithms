<?php

namespace Anso\Framework\Console\Command;

use Algorithms\UseCase\MemoryUsageUseCase;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Contract\ParameterBag;

class MemoryHandler extends BaseCommandHandler
{
    private MemoryUsageUseCase $memoryUsageUseCase;

    public function __construct(MemoryUsageUseCase $memoryUsageUseCase)
    {
        $this->memoryUsageUseCase = $memoryUsageUseCase;
    }

    public function handle(ParameterBag $parameters): string
    {
        $output = 'Memory usage: ' . $this->memoryUsageUseCase->memoryUsage() . IOManager::NEW_LINE;

        return $output;
    }

    public static function description(): string
    {
        return MemoryUsageUseCase::DESCRIPTION;
    }
}