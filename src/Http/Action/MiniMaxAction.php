<?php

namespace Algorithms\Http\Action;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\Entity\Result;
use Algorithms\Entity\ResultManager;
use Algorithms\UseCase\MiniMaxUseCase;
use Anso\Framework\Http\Response;
use Anso\Framework\Http\Request;
use Anso\Framework\Http\Contract\Routing\Action;

class MiniMaxAction implements Action
{
    private MiniMaxUseCase $useCase;

    private ResultManager $rm;

    public function __construct(MiniMaxUseCase $useCase, ResultManager $rm)
    {
        $this->useCase = $useCase;
        $this->rm = $rm;
    }

    public function execute(Request $request): Response
    {
        $integers = $request->post('integers');

        $miniMax = $this->useCase->countMiniMaxSums(new IntArrayBoundary($integers));

        $this->rm->saveResult(new Result('mini-max', implode(', ', $integers), implode(', ', $miniMax)));

        return new Response(['mini_max' => $miniMax]);
    }
}