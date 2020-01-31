<?php

namespace Anso\Framework\Console\Command;

use Algorithms\Boundary\IntBoundary;
use Algorithms\UseCase\TimeElapsedUseCase;
use Anso\Framework\Contract\ParameterBag;

class TimeElapsedHandler extends BaseCommandHandler
{
    private TimeElapsedUseCase $timeElapsedUseCase;

    public function __construct(TimeElapsedUseCase $timeElapsedUseCase)
    {
        $this->timeElapsedUseCase = $timeElapsedUseCase;
    }

    public function handle(ParameterBag $parameters): string
    {
        if (!$precision = $parameters->getOrFirst('precision')) {
            $precision = 3;
        }

        return $this->timeElapsedUseCase->timeElapsed(new IntBoundary($precision));
    }

    public static function description(): string
    {
        return TimeElapsedUseCase::DESCRIPTION . parent::description() .
            "precision - amount of digits after coma, e.g. --precision=3";
    }
}