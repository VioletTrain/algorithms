<?php

namespace Algorithms\Console;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\UseCase\MinimumContainersCounterUseCase;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Console\ParameterBag;

class MinimumContainersCounterHandler extends BaseCommandHandler
{
    private MinimumContainersCounterUseCase $useCase;

    public function __construct(MinimumContainersCounterUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function handle(ParameterBag $parameters): string
    {
        $items = $parameters->get('items');

        if (!$items) {
            $numberOfItems = IOManager::readInteger('number of items');
            $items = IOManager::readLine("Enter $numberOfItems items:");
        }

        $items = explode(' ', $items);

        return (string) $this->useCase->countContainers(new IntArrayBoundary($items));
    }

    public static function description(): string
    {
        return MinimumContainersCounterUseCase::DESCRIPTION . parent::description() .
            "items - integers to fit in containers, e.g. --items=3 4 5 6 6 7";
    }

}