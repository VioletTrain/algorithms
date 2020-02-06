<?php

namespace Anso\Framework\Http\Action;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\UseCase\MiniMaxUseCase;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;

class MiniMaxAction implements Action
{
    private MiniMaxUseCase $miniMax;

    public function __construct(MiniMaxUseCase $miniMax)
    {
        $this->miniMax = $miniMax;
    }

    public function execute(Request $request): Response
    {
        $integers = $request->post('integers');

        $miniMax = $this->miniMax->countMiniMaxSums(new IntArrayBoundary($integers));

        return new BaseResponse(['mini_max' => $miniMax]);
    }
}