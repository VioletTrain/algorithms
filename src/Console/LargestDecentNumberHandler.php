<?php

namespace Algorithms\Console;

use Algorithms\Boundary\IntBoundary;
use Algorithms\UseCase\LargestDecentNumberUseCase;
use Anso\Framework\Console\Contract\IOManager;
use Anso\Framework\Console\ParameterBag;

class LargestDecentNumberHandler extends BaseCommandHandler
{
    private LargestDecentNumberUseCase $useCase;
    private IOManager $ioManager;

    public function __construct(LargestDecentNumberUseCase $useCase, IOManager $ioManager)
    {
        $this->useCase = $useCase;
        $this->ioManager = $ioManager;
    }

    public function handle(ParameterBag $parameters): string
    {
        $length = $parameters->getOrFirst('length');

        if ($length) {
            return $this->useCase->largestDecentNumber(new IntBoundary($length));
        }

        $testCases = $this->ioManager->readInteger('number of test cases');

        for ($i = 0; $i < $testCases; $i++) {
            $length = $this->ioManager->readInteger('number of digits');
            $this->ioManager->writeLine($this->useCase->largestDecentNumber(new IntBoundary($length)));
        }

        return '';
    }

    public static function description(): string
    {
        return LargestDecentNumberUseCase::DESCRIPTION . parent::description() .
            "length - length of a number, e.g. --length=25";
    }
}