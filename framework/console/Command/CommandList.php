<?php

namespace Anso\Framework\Console\Command;

class CommandList
{
    public static function getCommands(): array
    {
        return [
            'q'         => \Anso\Framework\Console\Command\ExitCommand::class,
            'exit'      => \Anso\Framework\Console\Command\ExitCommand::class,
            'help'      => \Anso\Framework\Console\Command\HelpCommand::class,
            'memory'    => \Anso\Framework\Console\Command\MemoryCommand::class,
            'objects'   => \Anso\Framework\Console\Command\ObjectsCommand::class,
        ];
    }
}