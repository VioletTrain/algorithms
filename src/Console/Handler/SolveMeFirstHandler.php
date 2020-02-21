<?php

namespace Algorithms\Console\Handler;

use Algorithms\Boundary\IntBoundary;
use Algorithms\UseCase\SolveMeFirstUseCase;
use Anso\Framework\Console\Contract\IOManager;
use Anso\Framework\Console\ParameterBag;

class SolveMeFirstHandler extends BaseCommandHandler
{
    private SolveMeFirstUseCase $useCase;
    private IOManager $ioManager;

    public function __construct(SolveMeFirstUseCase $useCase, IOManager $ioManager)
    {
        $this->useCase = $useCase;
        $this->ioManager = $ioManager;
    }

    public function handle(ParameterBag $parameters): string
    {
        $a = $parameters->get('a') ?? $this->ioManager->readInteger("a");
        $b = $parameters->get('b') ?? $this->ioManager->readInteger("b");

        return "Sum of $a and $b is " . $this->useCase->sum(new IntBoundary($a), new IntBoundary($b));
    }

    public static function description(): string
    {
        return SolveMeFirstUseCase::DESCRIPTION . parent::description() .
            "a, b - integers to sum, e.g. --a=3 --b=5";
    }
}