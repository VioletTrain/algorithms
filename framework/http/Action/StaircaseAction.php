<?php

namespace Anso\Framework\Http\Action;

use Algorithms\Boundary\IntBoundary;
use Algorithms\UseCase\StaircaseUseCase;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;

class StaircaseAction implements Action
{
    private StaircaseUseCase $stairCaseUseCase;

    public function __construct(StaircaseUseCase $stairCaseUseCase)
    {
        $this->stairCaseUseCase = $stairCaseUseCase;
    }

    public function execute(Request $request): Response
    {
        $size = $request->get('size') ?? 0;

        $staircase = $this->stairCaseUseCase->build(new IntBoundary($size));

        return new BaseResponse($staircase);
    }
}