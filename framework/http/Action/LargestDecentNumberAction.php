<?php

namespace Anso\Framework\Http\Action;

use Algorithms\Boundary\IntBoundary;
use Algorithms\UseCase\LargestDecentNumberUseCase;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;

class LargestDecentNumberAction implements Action
{
    private LargestDecentNumberUseCase $useCase;

    public function __construct(LargestDecentNumberUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function execute(Request $request): Response
    {
        $length = $request->get('length');

        $largestDecentNumber = $this->useCase->largestDecentNumber(new IntBoundary($length));

        return new BaseResponse(['largest_decent_number' => $largestDecentNumber]);
    }
}