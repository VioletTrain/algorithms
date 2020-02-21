<?php

namespace Algorithms\Console;

class CommandList
{
    public static function getCommands(): array
    {
        return [
            'q'             => Handler\System\ExitHandler::class,
            'exit'          => Handler\System\ExitHandler::class,
            'help'          => Handler\System\HelpHandler::class,
            'memory'        => Handler\System\MemoryHandler::class,
            'objects'       => Handler\System\ObjectsHandler::class,
            'time'          => Handler\System\TimeElapsedHandler::class,
            'sum'           => Handler\SolveMeFirstHandler::class,
            'pm'            => Handler\PlusMinusHandler::class,
            'sc'            => Handler\StaircaseHandler::class,
            'mm'            => Handler\MiniMaxHandler::class,
            'bc'            => Handler\BirthdayCakeCandlesHandler::class,
            'tc'            => Handler\TimeConversionHandler::class,
            'itr'           => Handler\IntToRomanHandler::class,
            'ldn'           => Handler\LargestDecentNumberHandler::class,
            'mcn'           => Handler\MinimumContainersCounterHandler::class,
            'ms'            => Handler\MagicSquareHandler::class,
        ];
    }
}