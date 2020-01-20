<?php

namespace Anso\Framework\Console\Command;

use Algorithms\UseCase\StaircaseUseCase;
use Anso\Framework\Console\Contract\Command;
use Anso\Framework\Console\IOManager;

class StaircaseCommand implements Command
{
    private StaircaseUseCase $stairCaseUseCase;

    public function __construct(StaircaseUseCase $stairCaseUseCase)
    {
        $this->stairCaseUseCase = $stairCaseUseCase;
    }

    public function execute(): string
    {
        $size = IOManager::readInteger('size');

        return implode(IOManager::NEW_LINE, $this->stairCaseUseCase->staircase($size));
    }

    public static function description(): string
    {
        return StaircaseUseCase::DESCRIPTION;
    }
}