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
        $array = IOManager::readIntegersInline($arrayLength);

        $ratios = $this->plusMinusUseCase->countRatios($array);

        return implode(IOManager::NEW_LINE, $ratios);
    }

    public static function description(): string
    {
        return PlusMinusUseCase::DESCRIPTION;
    }
}