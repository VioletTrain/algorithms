<?php

namespace Algorithms\Http\Action;

use Algorithms\Boundary\IntBoundary;
use Algorithms\Entity\Result;
use Algorithms\Entity\ResultManager;
use Algorithms\UseCase\SolveMeFirstUseCase;
use Anso\Framework\Http\Response;
use Anso\Framework\Http\Request;
use Anso\Framework\Http\Contract\Routing\Action;

class SumAction implements Action
{
    private SolveMeFirstUseCase $useCase;

    private ResultManager $rm;

    public function __construct(SolveMeFirstUseCase $useCase, ResultManager $rm)
    {
        $this->useCase = $useCase;
        $this->rm = $rm;
    }

    public function execute(Request $request): Response
    {
        $a = $request->get('a');
        $b = $request->get('b');

        $sum = $this->useCase->sum(new IntBoundary($a), new IntBoundary($b));

        $this->rm->saveResult(new Result('sum', $a . ', ' .$b, $sum));

        return new Response(['sum' => $sum]);
    }
}