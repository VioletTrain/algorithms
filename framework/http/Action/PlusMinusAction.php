<?php

namespace Anso\Framework\Http\Action;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\UseCase\PlusMinusUseCase;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;

class PlusMinusAction implements Action
{
    private PlusMinusUseCase $useCase;

    public function __construct(PlusMinusUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function execute(Request $request): Response
    {
        $array = $request->post('array');

        $ratios = $this->useCase->countRatios(new IntArrayBoundary($array));

        return new BaseResponse(['ratios' => $ratios]);
    }
}