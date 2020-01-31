<?php

namespace Anso\Framework\Console\Command;

use Algorithms\UseCase\TimeElapsedUseCase;
use Anso\Framework\Console\Contract\CommandHandler;
use Anso\Framework\Contract\ParameterBag;

class TimeElapsedHandler implements CommandHandler
{
    private TimeElapsedUseCase $timeElapsedUseCase;

    public function __construct(TimeElapsedUseCase $timeElapsedUseCase)
    {
        $this->timeElapsedUseCase = $timeElapsedUseCase;
    }

    public function handle(ParameterBag $parameters): string
    {
        return $this->timeElapsedUseCase->timeElapsed();
    }

    public static function description(): string
    {
        return TimeElapsedUseCase::DESCRIPTION;
    }
}