<?php

namespace Anso\Framework\Http\Action;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\Entity\Result;
use Algorithms\Entity\ResultManager;
use Algorithms\UseCase\MinimumContainersCounterUseCase;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;

class MinimumContainersAction implements Action
{
    private MinimumContainersCounterUseCase $useCase;

    private ResultManager $rm;

    public function __construct(MinimumContainersCounterUseCase $useCase, ResultManager $rm)
    {
        $this->useCase = $useCase;
        $this->rm = $rm;
    }

    public function execute(Request $request): Response
    {
        $items = $request->post('items');

        $containersCount = $this->useCase->countContainers(new IntArrayBoundary($items));

        $this->rm->saveResult(new Result('minimum-containers', implode(', ', $items), $containersCount));

        return new BaseResponse(['containers_count' => $containersCount]);
    }
}