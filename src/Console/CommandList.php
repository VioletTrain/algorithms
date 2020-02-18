<?php

namespace Algorithms\Console;

class CommandList
{
    public static function getCommands(): array
    {
        return [
            'q'             => System\ExitHandler::class,
            'exit'          => System\ExitHandler::class,
            'help'          => System\HelpHandler::class,
            'memory'        => System\MemoryHandler::class,
            'objects'       => System\ObjectsHandler::class,
            'time'          => System\TimeElapsedHandler::class,
            'sum'           => SolveMeFirstHandler::class,
            'pm'            => PlusMinusHandler::class,
            'sc'            => StaircaseHandler::class,
            'mm'            => MiniMaxHandler::class,
            'bc'            => BirthdayCakeCandlesHandler::class,
            'tc'            => TimeConversionHandler::class,
            'itr'           => IntToRomanHandler::class,
            'ldn'           => LargestDecentNumberHandler::class,
            'mcn'           => MinimumContainersCounterHandler::class,
            'ms'            => MagicSquareHandler::class,
        ];
    }
}