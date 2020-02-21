<?php

namespace Algorithms\Console;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\UseCase\BirthdayCakeCandlesUseCase;
use Anso\Framework\Console\Contract\IOManager;
use Anso\Framework\Console\ParameterBag;

class BirthdayCakeCandlesHandler extends BaseCommandHandler
{
    private BirthdayCakeCandlesUseCase $useCase;
    private IOManager $ioManager;

    public function __construct(BirthdayCakeCandlesUseCase $useCase, IOManager $ioManager)
    {
        $this->useCase = $useCase;
        $this->ioManager = $ioManager;
    }

    public function handle(ParameterBag $parameters): string
    {
        $candlesInline = $parameters->get('candles');

        if (!$candlesInline) {
            $candlesNumber = $this->ioManager->readInteger("amount of candles");
            $candlesInline = $this->ioManager->readLine("Enter $candlesNumber candles");
        }

        $candles = explode(' ', $candlesInline);

        return $this->useCase->countTallestCandles(new IntArrayBoundary($candles));
    }

    public static function description(): string
    {
        return BirthdayCakeCandlesUseCase::DESCRIPTION . parent::description() .
            "candles - string of numbers separated by space, e.g. --candles=3 4 4 5 5 5'";
    }
}