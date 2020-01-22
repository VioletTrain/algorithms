<?php

namespace Anso\Framework\Console\Command;

use Algorithms\Boundary\TimeBoundary;
use Algorithms\Exception\InvalidTimeFormatException;
use Algorithms\UseCase\TimeConversionUseCase;
use Anso\Framework\Console\Contract\Command;
use Anso\Framework\Console\IOManager;

class TimeConversionCommand implements Command
{
    private TimeBoundary $timeBoundary;
    private TimeConversionUseCase $useCase;

    public function __construct(TimeBoundary $timeBoundary, TimeConversionUseCase $useCase)
    {
        $this->timeBoundary = $timeBoundary;
        $this->useCase = $useCase;
    }

    public function execute(): string
    {
        $time = IOManager::readLine('Enter time in regular 12-hours format:');

        try {
            $time = $this->timeBoundary->convert($time);
        } catch (InvalidTimeFormatException $e) {
            return $e->getMessage();
        }

        return $this->useCase->covertTimeFromRegularToMilitary($time);
    }

    public static function description(): string
    {
        return TimeConversionUseCase::DESCRIPTION;
    }
}