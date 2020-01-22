<?php

namespace Anso\Framework\Console\Command;

use Algorithms\UseCase\TimeConversionUseCase;
use Anso\Framework\Console\Contract\Command;
use Anso\Framework\Console\IOManager;

class TimeConversionCommand implements Command
{
    private TimeConversionUseCase $useCase;

    public function __construct(TimeConversionUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function execute(): string
    {
        $time = IOManager::readLine('Enter time in regular 12-hours format:');

        return $this->useCase->covertTimeFromRegularToMilitary($time);
    }

    public static function description(): string
    {
        return TimeConversionUseCase::DESCRIPTION;
    }
}