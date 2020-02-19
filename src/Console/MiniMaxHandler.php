<?php

namespace Algorithms\Console;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\UseCase\MiniMaxUseCase;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Console\ParameterBag;

class MiniMaxHandler extends BaseCommandHandler
{
    private MiniMaxUseCase $useCase;

    public function __construct(MiniMaxUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function handle(ParameterBag $parameters): string
    {
        $integers = $parameters->get('integers');

        if (!$integers) {
            $integers = IOManager::readLine("Enter integers:");
        }

        $integers = explode(' ', $integers);

        $miniMax = $this->useCase->countMiniMaxSums(new IntArrayBoundary($integers));

        return implode(" ", $miniMax);
    }

    public static function description(): string
    {
        return MiniMaxUseCase::DESCRIPTION . parent::description() .
            "integers - five integers to count mini-max from, e.g. --integers=5 3 2 4 5";
    }
}