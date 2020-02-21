<?php

namespace Algorithms\Console\Handler;

use Algorithms\Boundary\TimeBoundary;
use Algorithms\UseCase\TimeConversionUseCase;
use Anso\Framework\Console\Contract\IOManager;
use Anso\Framework\Console\ParameterBag;

class TimeConversionHandler extends BaseCommandHandler
{
    private TimeConversionUseCase $useCase;
    private IOManager $ioManager;

    public function __construct(TimeConversionUseCase $useCase, IOManager $ioManager)
    {
        $this->useCase = $useCase;
        $this->ioManager = $ioManager;
    }

    public function handle(ParameterBag $parameters): string
    {
        $input = $parameters->getOrFirst('time');

        if (!$input) {
            $input = $this->ioManager->readLine('Enter time in regular 12-hours format:');
        }

        return $this->useCase->covertTimeFromRegularToMilitary(new TimeBoundary($input));
    }

    public static function description(): string
    {
        return TimeConversionUseCase::DESCRIPTION . parent::description() .
            "time - time to convert, e.g. --time=10:10PM";
    }
}