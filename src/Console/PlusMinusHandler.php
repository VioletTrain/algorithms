<?php

namespace Algorithms\Console;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\UseCase\PlusMinusUseCase;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Console\ParameterBag;

class PlusMinusHandler extends BaseCommandHandler
{
    private PlusMinusUseCase $useCase;

    public function __construct(PlusMinusUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function handle(ParameterBag $parameters): string
    {
        $array = $parameters->get('array');

        if (!$array) {
            $arrayLength = IOManager::readInteger("array length");
            $array = IOManager::readLine("Enter $arrayLength integers:");
        }

        $array = explode(' ', $array);

        $ratios = $this->useCase->countRatios(new IntArrayBoundary($array));

        return implode(IOManager::NEW_LINE, $ratios);
    }

    public static function description(): string
    {
        return PlusMinusUseCase::DESCRIPTION . parent::description() .
            "array - array to count ratio from, e.g. --array=3 4 -5 0";
    }
}