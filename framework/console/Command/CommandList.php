<?php

namespace Anso\Framework\Console\Command;

class CommandList
{
    public static function getCommands(): array
    {
        return [
            'q'             => ExitCommand::class,
            'exit'          => ExitCommand::class,
            'help'          => HelpCommand::class,
            'memory'        => MemoryCommand::class,
            'objects'       => ObjectsCommand::class,
            'time'          => TimeElapsedCommand::class,
            'sum'           => SolveMeFirstCommand::class,
            'pm'            => PlusMinusCommand::class,
            'sc'            => StaircaseCommand::class,
            'mm'            => MiniMaxCommand::class,
            'bc'            => BirthdayCakeCandlesCommand::class,
            'tc'            => TimeConversionCommand::class,
            'itr'           => IntToRomanCommand::class,
            'ldn'           => LargestDecentNumberCommand::class,
            'mcn'           => MinimumContainersCounterCommand::class,
        ];
    }
}