<?php

namespace Anso\Framework\Console;

use Anso\Framework\Console\Contract\InputHandler;
use Anso\Framework\Console\Exception\CommandNotFoundException;
use Anso\Framework\Contract\Configuration;
use Anso\Framework\Contract\Container;
use Throwable;

class BaseInputHandler implements InputHandler
{
    protected CommandParser $commandParser;
    protected Container $container;
    protected Configuration $configuration;
    protected array $commands;

    public function __construct(CommandParser $commandParser, Container $container, Configuration $configuration)
    {
        $this->commandParser = $commandParser;
        $this->container = $container;
        $this->configuration = $configuration;
        $this->loadCommands();
    }

    protected function loadCommands()
    {
        $this->commands = include($this->configuration->configPath() . '/commands.php');
    }

    /**
     * @param string $input
     * @return string
     * @throws Throwable
     */
    public function handle(string $input): string
    {
        $commandName = $this->commandParser->parse($input);

        if (!$command = $this->findCommand($commandName)) {
            throw new CommandNotFoundException($commandName);
        }

        return $this->makeAndExecuteCommand($command);
    }

    protected function findCommand(string $commandName): string
    {
        return isset($this->commands[$commandName]) ? $this->commands[$commandName] : '';
    }

    /**
     * @param $command
     * @return string
     * @throws Throwable
     */
    protected function makeAndExecuteCommand($command): string
    {
        $command = $this->container->make($command);

        return $command->execute();
    }
}