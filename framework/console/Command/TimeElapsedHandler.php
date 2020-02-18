<?php

namespace Anso\Framework\Console\Command;

use Algorithms\Boundary\IntBoundary;
use Algorithms\UseCase\TimeElapsedUseCase;
use Anso\Framework\Contract\ParameterBag;

class TimeElapsedHandler extends BaseCommandHandler
{
    private TimeElapsedUseCase $useCase;

    public function __construct(TimeElapsedUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function handle(ParameterBag $parameters): string
    {
        if (!$precision = $parameters->getOrFirst('precision')) {
            $precision = TimeElapsedUseCase::DEFAULT_PRECISION;
        }

        return $this->useCase->timeElapsed(new IntBoundary($precision));
    }

    public static function description(): string
    {
        return TimeElapsedUseCase::DESCRIPTION . parent::description() .
            "precision - amount of digits after coma, e.g. --precision=5";
    }
}