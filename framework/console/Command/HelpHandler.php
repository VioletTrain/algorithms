<?php

namespace Anso\Framework\Console\Command;

use Anso\Framework\Console\Exception\CommandNotFoundException;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Contract\ParameterBag;

class HelpHandler extends BaseCommandHandler
{
    public function handle(ParameterBag $parameters): string
    {
        $commands = CommandList::getCommands();
        $commandName = $parameters->get('command-name') ? $parameters->get('command-name') : $parameters->first();

        if ($commandName) {
            if (isset($commands[$commandName])) {
                return $commands[$commandName]::description();
            } else {
                throw new CommandNotFoundException($commandName);
            }
        }

        $output = "Commands with 1 (one) non-array argument can accept it without name, e.g.:"
            . IOManager::NEW_LINE . " > sc --size=5" . IOManager::NEW_LINE . "or" . IOManager::NEW_LINE
            . " > sc 5" . IOManager::NEW_LINE . IOManager::NEW_LINE;
        $output .= "Available commands: " . IOManager::NEW_LINE;

        foreach ($commands as $name => $command) {
            $output .= $name . " - " . $command::description() . IOManager::NEW_LINE . IOManager::NEW_LINE;
        }

        return $output;
    }

    public static function description(): string
    {
        return "List all available commands" . parent::description() .
            "command-name - if specified, shows explanation of a specific command, e.g. --command-name=bc";
    }
}