<?php

namespace Anso\Framework\Console\Command;

class CommandList
{
    public static function getCommands(): array
    {
        return [
            'q'             => ExitHandler::class,
            'exit'          => ExitHandler::class,
            'help'          => HelpHandler::class,
            'memory'        => MemoryHandler::class,
            'objects'       => ObjectsHandler::class,
            'time'          => TimeElapsedHandler::class,
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