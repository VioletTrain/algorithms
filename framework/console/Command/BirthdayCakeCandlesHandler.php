<?php

namespace Anso\Framework\Console\Command;

use Algorithms\Boundary\IntArrayBoundary;
use Algorithms\UseCase\BirthdayCakeCandlesUseCase;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Contract\ParameterBag;

class BirthdayCakeCandlesHandler extends BaseCommandHandler
{
    private BirthdayCakeCandlesUseCase $cake;

    public function __construct(BirthdayCakeCandlesUseCase $cake)
    {
        $this->cake = $cake;
    }

    public function handle(ParameterBag $parameters): string
    {
        $candlesInline = $parameters->get('candles');

        if (!$candlesInline) {
            $candlesNumber = IOManager::readInteger("amount of candles");
            $candlesInline = IOManager::readLine("Enter $candlesNumber candles");
        }

        $candles = explode(' ', $candlesInline);

        return $this->cake->countTallestCandles(new IntArrayBoundary($candles));
    }

    public static function description(): string
    {
        return BirthdayCakeCandlesUseCase::DESCRIPTION . parent::description() .
            "candles - string of numbers separated by space, e.g. --candles=3 4 4 5 5 5'";
    }
}