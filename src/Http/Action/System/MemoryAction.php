<?php

namespace Algorithms\Http\Action\System;

use Algorithms\UseCase\MemoryUsageUseCase;
use Anso\Framework\Http\Response;
use Anso\Framework\Http\Request;
use Anso\Framework\Http\Contract\Routing\Action;

class MemoryAction implements Action
{
    private MemoryUsageUseCase $memoryUsageUseCase;

    public function __construct(MemoryUsageUseCase $memoryUsageUseCase)
    {
        $this->memoryUsageUseCase = $memoryUsageUseCase;
    }

    public function execute(Request $request): Response
    {
        return new Response(['memory_usage' => $this->memoryUsageUseCase->memoryUsage()]);
    }
}