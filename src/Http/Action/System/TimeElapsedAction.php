<?php

namespace Algorithms\Http\Action\System;

use Algorithms\Boundary\IntBoundary;
use Algorithms\UseCase\TimeElapsedUseCase;
use Anso\Framework\Http\Response;
use Anso\Framework\Http\Request;
use Anso\Framework\Http\Contract\Routing\Action;

class TimeElapsedAction implements Action
{
    private TimeElapsedUseCase $useCase;

    public function __construct(TimeElapsedUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function execute(Request $request): Response
    {
        if (!$precision = $request->get('precision')) {
            $precision = TimeElapsedUseCase::DEFAULT_PRECISION;
        }

        return new Response(['time_elapsed' => $this->useCase->timeElapsed(new IntBoundary($precision))]);
    }
}