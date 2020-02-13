<?php

namespace Anso\Framework\Http\Action;

use Algorithms\Boundary\IntBoundary;
use Algorithms\Entity\Result;
use Algorithms\Entity\ResultManager;
use Algorithms\UseCase\StaircaseUseCase;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;

class StaircaseAction implements Action
{
    private StaircaseUseCase $stairCaseUseCase;

    private ResultManager $rm;

    public function __construct(StaircaseUseCase $stairCaseUseCase, ResultManager $rm)
    {
        $this->stairCaseUseCase = $stairCaseUseCase;
        $this->rm = $rm;
    }

    public function execute(Request $request): Response
    {
        $size = $request->get('size');

        $staircase = $this->stairCaseUseCase->build(new IntBoundary($size));

        $this->rm->saveResult(new Result('staircase', $size, implode(', ', $staircase)));

        return new BaseResponse(['staircase' => $staircase]);
    }
}