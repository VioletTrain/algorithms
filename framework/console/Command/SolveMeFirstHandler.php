<?php

namespace Anso\Framework\Console\Command;

use Algorithms\Boundary\IntBoundary;
use Algorithms\UseCase\SolveMeFirstUseCase;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Contract\ParameterBag;

class SolveMeFirstHandler extends BaseCommandHandler
{
    private SolveMeFirstUseCase $sumUseCase;

    public function __construct(SolveMeFirstUseCase $sumUseCase)
    {
        $this->sumUseCase = $sumUseCase;
    }

    public function handle(ParameterBag $parameters): string
    {
        $a = $parameters->get('a') ?? IOManager::readInteger("a");
        $b = $parameters->get('b') ?? IOManager::readInteger("b");

        return "Sum of $a and $b is " . $this->sumUseCase->sum(new IntBoundary($a), new IntBoundary($b));
    }

    public static function description(): string
    {
        return SolveMeFirstUseCase::DESCRIPTION . parent::description() .
            "a, b - integers to sum, e.g. --a=3 --b=5";
    }
}