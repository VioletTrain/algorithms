<?php

namespace Anso\Framework\Console\Command;

use Algorithms\UseCase\MiniMaxUseCase;
use Anso\Framework\Console\Contract\Command;
use Anso\Framework\Console\IOManager;

class MiniMaxCommand implements Command
{
    private MiniMaxUseCase $miniMax;

    public function __construct(MiniMaxUseCase $miniMax)
    {
        $this->miniMax = $miniMax;
    }

    public function execute(): string
    {
        $integers = IOManager::readIntegersInline(5);

        $miniMax = $this->miniMax->countMiniMaxSums($integers);

        return implode(" ", $miniMax);
    }

    public static function description(): string
    {
        return MiniMaxUseCase::DESCRIPTION;
    }
}