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
        $a = IOManager::readInteger("a");
        $b = IOManager::readInteger("b");

        return "Sum of $a and $b is " . $this->sumUseCase->sum((int)$a, (int)$b);
    }

    public static function description(): string
    {
        return SolveMeFirstUseCase::DESCRIPTION;
    }
}