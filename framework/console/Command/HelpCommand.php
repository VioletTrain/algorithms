<?php

namespace Anso\Framework\Console\Command;


use Anso\Framework\Console\Contract\Command;

class HelpCommand implements Command
{
    public function execute(): string
    {
        $commands = CommandList::getCommands();
        $output = "Available commands: \n\n";

        foreach ($commands as $name => $command) {
            $output .= $name . " - " . $command::description() ."\n";
        }

        return $output;
    }

    public static function description(): string
    {
        return 'List all available commands';
    }
}