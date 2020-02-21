<?php

namespace Algorithms\Console\Handler\System;

use Algorithms\Console\Handler\BaseCommandHandler;
use Algorithms\UseCase\MemoryUsageUseCase;
use Anso\Framework\Console\Contract\IOManager;
use Anso\Framework\Console\ParameterBag;

class MemoryHandler extends BaseCommandHandler
{
    private MemoryUsageUseCase $useCase;
    private IOManager $ioManager;


    public function __construct(MemoryUsageUseCase $useCase, IOManager $ioManager)
    {
        $this->useCase = $useCase;
        $this->ioManager = $ioManager;
    }

    public function handle(ParameterBag $parameters): string
    {
        $output = 'Memory usage: ' . $this->useCase->memoryUsage() . $this->ioManager->newLine();

        return $output;
    }

    public static function description(): string
    {
        return MemoryUsageUseCase::DESCRIPTION;
    }
}