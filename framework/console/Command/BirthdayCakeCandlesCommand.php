<?php

namespace Anso\Framework\Console\Command;

use Algorithms\UseCase\BirthdayCakeCandlesUseCase;
use Anso\Framework\Console\Contract\Command;
use Anso\Framework\Console\IOManager;

class BirthdayCakeCandlesCommand implements Command
{
    private BirthdayCakeCandlesUseCase $cake;

    public function __construct(BirthdayCakeCandlesUseCase $cake)
    {
        $this->cake = $cake;
    }

    public function execute(): string
    {
        $candlesNumber = IOManager::readInteger("amount of candles");
        $candles = IOManager::readIntegersInline($candlesNumber);

        return $this->cake->countTallestCandles($candles);
    }

    public static function description(): string
    {
        return BirthdayCakeCandlesUseCase::DESCRIPTION;
    }
}