<?php

namespace Anso\Framework\Console\Command;

use Algorithms\UseCase\SolveMeFirstUseCase;
use Anso\Framework\Console\Contract\Command;
use Anso\Framework\Console\IOManager;

class SumCommand implements Command
{
    private SolveMeFirstUseCase $sumUseCase;

    public function __construct(SolveMeFirstUseCase $sumUseCase)
    {
        $this->sumUseCase = $sumUseCase;
    }

    public function execute(): string
    {
        $a = $this->readInteger("a");
        $b = $this->readInteger("b");

        return "Sum of $a and $b is " . $this->sumUseCase->sum((int)$a, (int)$b);
    }

    private function readInteger(string $integerName): int
    {
        $integer = IOManager::readInput("Enter $integerName:");

        if (!is_numeric($integer)) {
            IOManager::writeOutput("Input data must be an integer");

            return $this->readInteger($integerName);
        }

        return $integer;
    }

    public static function description(): string
    {
        return SolveMeFirstUseCase::DESCRIPTION;
    }
}