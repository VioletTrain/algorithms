<?php

namespace Algorithms\Console;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\UseCase\MiniMaxUseCase;
use Anso\Framework\Console\Contract\IOManager;
use Anso\Framework\Console\ParameterBag;

class MiniMaxHandler extends BaseCommandHandler
{
    private MiniMaxUseCase $useCase;
    private IOManager $ioManager;

    public function __construct(MiniMaxUseCase $useCase, IOManager $ioManager)
    {
        $this->useCase = $useCase;
        $this->ioManager = $ioManager;
    }

    public function handle(ParameterBag $parameters): string
    {
        $integers = $parameters->get('integers');

        if (!$integers) {
            $integers = $this->ioManager->readLine("Enter integers:");
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