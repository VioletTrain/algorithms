<?php

namespace Algorithms\Http\Action;

use Algorithms\Boundary\IntBoundary;
use Algorithms\Entity\Result;
use Algorithms\Entity\ResultManager;
use Algorithms\UseCase\StaircaseUseCase;
use Anso\Framework\Http\Response;
use Anso\Framework\Http\Request;
use Anso\Framework\Http\Contract\Routing\Action;

class StaircaseAction implements Action
{
    private StaircaseUseCase $useCase;

    private ResultManager $rm;

    public function __construct(StaircaseUseCase $useCase, ResultManager $rm)
    {
        $this->useCase = $useCase;
        $this->rm = $rm;
    }

    public function execute(Request $request): Response
    {
        $size = $request->get('size');

        $staircase = $this->useCase->build(new IntBoundary($size));

        $this->rm->saveResult(new Result('staircase', $size, implode(', ', $staircase)));

        return new Response(['staircase' => $staircase]);
    }
}