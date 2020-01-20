<?php

namespace Anso\Framework\Console\Command;

use Algorithms\UseCase\PlusMinusUseCase;
use Anso\Framework\Console\Contract\Command;
use Anso\Framework\Console\IOManager;

class PlusMinusCommand implements Command
{
    private PlusMinusUseCase $plusMinusUseCase;

    public function __construct(PlusMinusUseCase $plusMinusUseCase)
    {
        $this->plusMinusUseCase = $plusMinusUseCase;
    }

    public function execute(): string
    {
        $arrayLength = IOManager::readInteger("array length");
        $array = $this->promptAndGetNIntegersArray($arrayLength);

        $ratios = $this->plusMinusUseCase->countRatios($array);

        return implode(IOManager::NEW_LINE, $ratios);
    }

    private function promptAndGetNIntegersArray(int $n): array
    {
        $integers = IOManager::readLine("Enter $n integers separated by space:");
        $array = explode(' ', $integers);

        if (count($array) !== $n) {
            IOManager::writeLine("The number of integers must be $n. ");

            return $this->promptAndGetNIntegersArray($n);
        }

        return array_map('intval', $array);
    }

    public static function description(): string
    {
        return PlusMinusUseCase::DESCRIPTION;
    }
}