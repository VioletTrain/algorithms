<?php

namespace Anso\Framework\Http\Action;

use Algorithms\UseCase\MemoryUsageUseCase;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
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
        return new BaseResponse(['memory_usage' => $this->memoryUsageUseCase->memoryUsage()]);
    }
}