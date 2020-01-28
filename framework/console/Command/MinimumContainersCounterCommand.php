<?php

namespace Anso\Framework\Console\Command;

use Algorithms\UseCase\MinimumContainersCounterUseCase;
use Anso\Framework\Console\Contract\Command;
use Anso\Framework\Console\IOManager;

class MinimumContainersCounterCommand implements Command
{
    private MinimumContainersCounterUseCase $useCase;

    public function __construct(MinimumContainersCounterUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function execute(): string
    {
        $numberOfItems = IOManager::readInteger('number of items');

        $items = IOManager::readIntegersInline($numberOfItems);

        return (string) $this->useCase->countContainers($items);
    }

    public static function description(): string
    {
        return MinimumContainersCounterUseCase::DESCRIPTION;
    }

}