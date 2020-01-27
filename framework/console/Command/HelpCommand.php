<?php

namespace Anso\Framework\Console\Command;


use Anso\Framework\Console\Contract\Command;
use Anso\Framework\Console\IOManager;

class HelpCommand implements Command
{
    public function execute(): string
    {
        $commands = CommandList::getCommands();
        $output = "Available commands: \n\n";

        foreach ($commands as $name => $command) {
            $output .= $name . " - " . $command::description() . IOManager::NEW_LINE . IOManager::NEW_LINE;
        }

        return $output;
    }

    public static function description(): string
    {
        return 'List all available commands';
    }
}