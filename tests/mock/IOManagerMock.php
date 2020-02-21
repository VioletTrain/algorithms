<?php

namespace Tests\Mock;

use Anso\Framework\Console\Contract\IOManager;

class IOManagerMock implements IOManager
{
    private array $commands;

    public function readLine($prompt = ''): string
    {
        return array_shift($this->commands) ?? 'exit';
    }

    public function writeLine(string $output): void
    {
        echo $this->newLine() . $output . $this->newLine() . $this->newLine();
    }

    public function readInteger(string $integerName): int
    {
        return array_shift($this->commands) ?? 1;
    }

    public function pushCommand(string $command): IOManagerMock
    {
        $this->commands[] = $command;

        return $this;
    }

    public function newLine(): string
    {
        return "\n";
    }
}