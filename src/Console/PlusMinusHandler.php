<?php

namespace Algorithms\Console;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\UseCase\PlusMinusUseCase;
use Anso\Framework\Console\Contract\IOManager;
use Anso\Framework\Console\ParameterBag;

class PlusMinusHandler extends BaseCommandHandler
{
    private PlusMinusUseCase $useCase;
    private IOManager $ioManager;

    public function __construct(PlusMinusUseCase $useCase, IOManager $ioManager)
    {
        $this->useCase = $useCase;
        $this->ioManager = $ioManager;
    }

    public function handle(ParameterBag $parameters): string
    {
        $array = $parameters->get('array');

        if (!$array) {
            $arrayLength = $this->ioManager->readInteger("array length");
            $array = $this->ioManager->readLine("Enter $arrayLength integers:");
        }

        $array = explode(' ', $array);

        $ratios = $this->useCase->countRatios(new IntArrayBoundary($array));

        return implode($this->ioManager->newLine(), $ratios);
    }

    public static function description(): string
    {
        return PlusMinusUseCase::DESCRIPTION . parent::description() .
            "array - array to count ratio from, e.g. --array=3 4 -5 0";
    }
}