<?php

namespace Anso\Framework\Console\Command;

class CommandCollection
{
    private array $commands;

    public function __construct(array $commands)
    {
        $this->commands = $commands;
    }

    public function findCommand(string $name): string
    {
        return isset($this->commands[$name]) ? $this->commands[$name] : '';
    }
}