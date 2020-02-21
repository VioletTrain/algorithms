<?php

namespace Algorithms\Console;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\UseCase\MinimumContainersCounterUseCase;
use Anso\Framework\Console\Contract\IOManager;
use Anso\Framework\Console\ParameterBag;

class MinimumContainersCounterHandler extends BaseCommandHandler
{
    private MinimumContainersCounterUseCase $useCase;
    private IOManager $ioManager;

    public function __construct(MinimumContainersCounterUseCase $useCase, IOManager $ioManager)
    {
        $this->useCase = $useCase;
        $this->ioManager = $ioManager;
    }

    public function handle(ParameterBag $parameters): string
    {
        $items = $parameters->get('items');

        if (!$items) {
            $numberOfItems = $this->ioManager->readInteger('number of items');
            $items = $this->ioManager->readLine("Enter $numberOfItems items:");
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