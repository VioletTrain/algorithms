<?php

namespace Anso\Framework\Console\Command;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\UseCase\MiniMaxUseCase;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Contract\ParameterBag;

class MiniMaxHandler extends BaseCommandHandler
{
    private MiniMaxUseCase $miniMax;

    public function __construct(MiniMaxUseCase $miniMax)
    {
        $this->miniMax = $miniMax;
    }

    public function handle(ParameterBag $parameters): string
    {
        $integers = $parameters->get('integers');

        if (!$integers) {
            $integers = IOManager::readLine("Enter integers:");
        }

        $integers = explode(' ', $integers);

        $miniMax = $this->miniMax->countMiniMaxSums(new IntArrayBoundary($integers));

        return implode(" ", $miniMax);
    }

    public static function description(): string
    {
        return MiniMaxUseCase::DESCRIPTION . parent::description() .
            "integers - five integers to count mini-max from, e.g. --integers=5 3 2 4 5";
    }
}