<?php

namespace Algorithms\Http;

use Algorithms\Boundary\IntBoundary;
use Algorithms\Entity\Result;
use Algorithms\Entity\ResultManager;
use Algorithms\UseCase\LargestDecentNumberUseCase;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;

class LargestDecentNumberAction implements Action
{
    private LargestDecentNumberUseCase $useCase;

    private ResultManager $rm;

    public function __construct(LargestDecentNumberUseCase $useCase, ResultManager $rm)
    {
        $this->useCase = $useCase;
        $this->rm = $rm;
    }

    public function execute(Request $request): Response
    {
        $length = $request->get('length');

        $largestDecentNumber = $this->useCase->largestDecentNumber(new IntBoundary($length));

        $this->rm->saveResult(new Result('largest-decent-number', $length, $largestDecentNumber));

        return new BaseResponse(['largest_decent_number' => $largestDecentNumber]);
    }
}