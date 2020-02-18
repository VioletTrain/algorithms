<?php

namespace Algorithms\Http;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\Entity\Result;
use Algorithms\Entity\ResultManager;
use Algorithms\UseCase\BirthdayCakeCandlesUseCase;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;

class BirthdayCakeCandlesAction implements Action
{
    private BirthdayCakeCandlesUseCase $useCase;

    private ResultManager $rm;

    public function __construct(BirthdayCakeCandlesUseCase $useCase, ResultManager $rm)
    {
        $this->useCase = $useCase;
        $this->rm = $rm;
    }

    public function execute(Request $request): Response
    {
        $candles = $request->post('candles');

        $tallestCandlesCount = $this->useCase->countTallestCandles(new IntArrayBoundary($candles));

        $this->rm->saveResult(new Result('birthday-cake-candles', implode(', ', $candles), $tallestCandlesCount));

        return new BaseResponse(['tallest_candles_count' => $tallestCandlesCount]);
    }
}