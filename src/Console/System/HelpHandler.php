<?php

namespace Algorithms\Console\System;

use Algorithms\Console\BaseCommandHandler;
use Algorithms\Console\CommandList;
use Anso\Framework\Console\Exception\CommandNotFoundException;
use Anso\Framework\Console\Contract\IOManager;
use Anso\Framework\Console\ParameterBag;

class HelpHandler extends BaseCommandHandler
{
    private IOManager $ioManager;

    public function __construct(IOManager $ioManager)
    {
        $this->ioManager = $ioManager;
    }

    public function handle(ParameterBag $parameters): string
    {
        $commands = CommandList::getCommands();
        $commandName = $parameters->getOrFirst('command-name');

        if ($commandName) {
            if (isset($commands[$commandName])) {
                return $commands[$commandName]::description();
            } else {
                throw new CommandNotFoundException($commandName);
            }
        }

        $output = "Commands with 1 (one) non-array argument can accept it without name, e.g.:"
            . $this->ioManager->newLine() . " > sc --size=5" . $this->ioManager->newLine() . "or" . $this->ioManager->newLine()
            . " > sc 5" . $this->ioManager->newLine() . $this->ioManager->newLine();
        $output .= "Available commands: " . $this->ioManager->newLine();

        foreach ($commands as $name => $command) {
            $output .= $name . " - " . $command::description() . $this->ioManager->newLine() . $this->ioManager->newLine();
        }

        return $output;
    }

    public static function description(): string
    {
        return "List all available commands" . parent::description() .
            "command-name - if specified, shows explanation of a specific command, e.g. --command-name=bc";
    }
}