<?php

namespace Anso\Framework\Console;

use Anso\Framework\Base\BaseApp;
use Anso\Framework\Console\Contract\ConsoleFrontController;
use Anso\Framework\Console\Exception\ConsoleExceptionHandler;
use Throwable;

class ConsoleApp extends BaseApp
{
    private ConsoleExceptionHandler $exceptionHandler;
    private ConsoleFrontController $frontController;
    private CommandParser $commandParser;

    public function start(): void
    {
        $this->exceptionHandler = new ConsoleExceptionHandler();

        try {
            $this->frontController = $this->container->make(ConsoleFrontController::class);
            $this->commandParser = $this->container->make(CommandParser::class);
        } catch (Throwable $e) {
            $this->exceptionHandler->handle($e);
        }

        IOManager::writeLine("Hello there. Type 'help' to list available commands.\n");

        while (true) {
            $input = IOManager::readLine();

            try {
                $command = $this->commandParser->parse($input);
                $output = $this->frontController->handle($command);
            } catch (Throwable $e) {
                $this->exceptionHandler->handle($e);
                continue;
            }

            IOManager::writeLine($output);
        }
    }
}