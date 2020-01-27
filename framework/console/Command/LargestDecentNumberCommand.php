<?php

namespace Anso\Framework\Console\Command;

use Algorithms\UseCase\LargestDecentNumberUseCase;
use Anso\Framework\Console\Contract\Command;
use Anso\Framework\Console\IOManager;

class LargestDecentNumberCommand implements Command
{
    private LargestDecentNumberUseCase $useCase;

    public function __construct(LargestDecentNumberUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function execute(): string
    {
        $testCases = IOManager::readInteger('number of test cases');

        for ($i = 0; $i < $testCases; $i++) {
            $length = IOManager::readInteger('number of digits');
            IOManager::writeLine($this->useCase->largestDecentNumber($length));
        }

        return '';
    }

    public static function description(): string
    {
        return LargestDecentNumberUseCase::DESCRIPTION;
    }
}