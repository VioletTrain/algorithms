<?php

namespace Algorithms\Console;

use Algorithms\Boundary\IntBoundary;
use Algorithms\UseCase\LargestDecentNumberUseCase;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Contract\ParameterBag;

class LargestDecentNumberHandler extends BaseCommandHandler
{
    private LargestDecentNumberUseCase $useCase;

    public function __construct(LargestDecentNumberUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function handle(ParameterBag $parameters): string
    {
        $length = $parameters->getOrFirst('length');

        if ($length) {
            return $this->useCase->largestDecentNumber(new IntBoundary($length));
        }

        $testCases = IOManager::readInteger('number of test cases');

        for ($i = 0; $i < $testCases; $i++) {
            $length = IOManager::readInteger('number of digits');
            IOManager::writeLine($this->useCase->largestDecentNumber(new IntBoundary($length)));
        }

        return '';
    }

    public static function description(): string
    {
        return LargestDecentNumberUseCase::DESCRIPTION . parent::description() .
            "length - length of a number, e.g. --length=25";
    }
}