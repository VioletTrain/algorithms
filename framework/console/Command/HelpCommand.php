<?php

namespace Anso\Framework\Console\Command;


class HelpCommand
{
    public const SIGNATURE = 'help';

    public function execute()
    {
        $commands = CommandList::getCommands();
        $output = "Available commands: \n\n";

        foreach ($commands as $name => $command) {
            $output .= $name ."\n";
        }

        return $output;
    }
}