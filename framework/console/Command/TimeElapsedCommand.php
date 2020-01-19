<?php

namespace Anso\Framework\Console\Command;

use Algorithms\UseCase\TimeElapsedUseCase;
use Anso\Framework\Console\Contract\Command;

class TimeElapsedCommand implements Command
{
    private TimeElapsedUseCase $timeElapsedUseCase;

    public function __construct(TimeElapsedUseCase $timeElapsedUseCase)
    {
        $this->timeElapsedUseCase = $timeElapsedUseCase;
    }

    public function execute(): string
    {
        return $this->timeElapsedUseCase->timeElapsed();
    }

    public static function description(): string
    {
        return TimeElapsedUseCase::DESCRIPTION;
    }
}