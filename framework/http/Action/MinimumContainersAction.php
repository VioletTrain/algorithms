<?php

namespace Anso\Framework\Http\Action;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\UseCase\MinimumContainersCounterUseCase;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;

class MinimumContainersAction implements Action
{
    private MinimumContainersCounterUseCase $useCase;

    public function __construct(MinimumContainersCounterUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function execute(Request $request): Response
    {
        $items = $request->post('items');

        $containersCount = $this->useCase->countContainers(new IntArrayBoundary($items));

        return new BaseResponse(['containers_count' => $containersCount]);
    }
}