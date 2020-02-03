<?php

namespace Anso\Framework\Http\Action;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\UseCase\BirthdayCakeCandlesUseCase;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;

class BirthdayCakeCandlesAction implements Action
{
    private BirthdayCakeCandlesUseCase $useCase;

    public function __construct(BirthdayCakeCandlesUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function execute(Request $request): Response
    {
        if (!$candles = $request->get('candles')) {
            $candles = [];
        }

        $tallestCandlesCount = $this->useCase->countTallestCandles(new IntArrayBoundary($candles));

        return new BaseResponse(['tallest_candles_count' => $tallestCandlesCount]);
    }
}