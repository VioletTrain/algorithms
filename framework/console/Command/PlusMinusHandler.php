<?php

namespace Anso\Framework\Console\Command;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\UseCase\PlusMinusUseCase;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Contract\ParameterBag;

class PlusMinusHandler extends BaseCommandHandler
{
    private PlusMinusUseCase $plusMinusUseCase;

    public function __construct(PlusMinusUseCase $plusMinusUseCase)
    {
        $this->plusMinusUseCase = $plusMinusUseCase;
    }

    public function handle(ParameterBag $parameters): string
    {
        $array = $parameters->get('array');

        if (!$array) {
            $arrayLength = IOManager::readInteger("array length");
            $array = IOManager::readLine("Enter $arrayLength integers:");
        }

        $array = explode(' ', $array);

        $ratios = $this->plusMinusUseCase->countRatios(new IntArrayBoundary($array));

        return implode(IOManager::NEW_LINE, $ratios);
    }

    public static function description(): string
    {
        return PlusMinusUseCase::DESCRIPTION . parent::description() .
            "array - array to count ratio from, e.g. --array=3 4 -5 0";
    }
}