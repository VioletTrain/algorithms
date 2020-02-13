<?php

namespace Anso\Framework\Http\Action;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\Entity\Result;
use Algorithms\Entity\ResultManager;
use Algorithms\UseCase\MiniMaxUseCase;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;

class MiniMaxAction implements Action
{
    private MiniMaxUseCase $miniMax;

    private ResultManager $rm;

    public function __construct(MiniMaxUseCase $miniMax, ResultManager $rm)
    {
        $this->miniMax = $miniMax;
        $this->rm = $rm;
    }

    public function execute(Request $request): Response
    {
        $integers = $request->post('integers');

        $miniMax = $this->miniMax->countMiniMaxSums(new IntArrayBoundary($integers));

        $this->rm->saveResult(new Result('mini-max', implode(', ', $integers), implode(', ', $miniMax)));

        return new BaseResponse(['mini_max' => $miniMax]);
    }
}