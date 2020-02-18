<?php

namespace Anso\Framework\Console\Command;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\UseCase\BirthdayCakeCandlesUseCase;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Contract\ParameterBag;

class BirthdayCakeCandlesHandler extends BaseCommandHandler
{
    private BirthdayCakeCandlesUseCase $useCase;

    public function __construct(BirthdayCakeCandlesUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function handle(ParameterBag $parameters): string
    {
        $candlesInline = $parameters->get('candles');

        if (!$candlesInline) {
            $candlesNumber = IOManager::readInteger("amount of candles");
            $candlesInline = IOManager::readLine("Enter $candlesNumber candles");
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