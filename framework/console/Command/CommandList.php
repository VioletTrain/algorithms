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
            'sum'           => SumCommand::class,
            'pm'            => PlusMinusCommand::class,
        ];
    }
}