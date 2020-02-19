<?php

namespace Algorithms\Console\System;

use Algorithms\Console\BaseCommandHandler;
use Algorithms\UseCase\MemoryUsageUseCase;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Console\ParameterBag;

class MemoryHandler extends BaseCommandHandler
{
    private MemoryUsageUseCase $useCase;

    public function __construct(MemoryUsageUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function handle(ParameterBag $parameters): string
    {
        $output = 'Memory usage: ' . $this->useCase->memoryUsage() . IOManager::NEW_LINE;

        return $output;
    }

    public static function description(): string
    {
        return MemoryUsageUseCase::DESCRIPTION;
    }
}