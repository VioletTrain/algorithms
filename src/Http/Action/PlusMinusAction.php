<?php

namespace Algorithms\Http\Action;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\Entity\Result;
use Algorithms\Entity\ResultManager;
use Algorithms\UseCase\PlusMinusUseCase;
use Anso\Framework\Http\Response;
use Anso\Framework\Http\Request;
use Anso\Framework\Http\Contract\Routing\Action;

class PlusMinusAction implements Action
{
    private PlusMinusUseCase $useCase;

    private ResultManager $rm;

    public function __construct(PlusMinusUseCase $useCase, ResultManager $rm)
    {
        $this->useCase = $useCase;
        $this->rm = $rm;
    }

    public function execute(Request $request): Response
    {
        $array = $request->post('array');

        $ratios = $this->useCase->countRatios(new IntArrayBoundary($array));

        $this->rm->saveResult(new Result('plus-minus', implode(', ', $array), implode(', ', $ratios)));

        return new Response(['ratios' => $ratios]);
    }
}