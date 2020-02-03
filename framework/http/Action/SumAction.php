<?php

namespace Anso\Framework\Http\Action;

use Algorithms\Boundary\IntBoundary;
use Algorithms\UseCase\SolveMeFirstUseCase;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;

class SumAction implements Action
{
    private SolveMeFirstUseCase $useCase;

    public function __construct(SolveMeFirstUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function execute(Request $request): Response
    {
        $a = $request->get('a') ?? 0;
        $b = $request->get('b') ?? 0;

        $sum = $this->useCase->sum(new IntBoundary($a), new IntBoundary($b));

        return new BaseResponse(['sum' => $sum]);
    }
}