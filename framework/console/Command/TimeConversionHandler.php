<?php

namespace Anso\Framework\Console\Command;

use Algorithms\Boundary\TimeBoundary;
use Algorithms\UseCase\TimeConversionUseCase;
use Anso\Framework\Console\Contract\CommandHandler;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Contract\ParameterBag;

class TimeConversionHandler implements CommandHandler
{
    private TimeConversionUseCase $useCase;

    public function __construct(TimeConversionUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function handle(ParameterBag $parameters): string
    {
        $input = $parameters->get('time') ? $parameters->get('time') : $parameters->first();

        if (!$input) {
            $input = IOManager::readLine('Enter time in regular 12-hours format:');
        }

        return $this->useCase->covertTimeFromRegularToMilitary(new TimeBoundary($input));
    }

    public static function description(): string
    {
        return TimeConversionUseCase::DESCRIPTION;
    }
}