<?php

namespace Anso\Framework\Console;

use Anso\Framework\Base\BaseApp;
use Anso\Framework\Contract\ExceptionHandler;
use Throwable;

class ConsoleApp extends BaseApp
{
    private ExceptionHandler $exceptionHandler;
    private FrontController $frontController;
    private CommandParser $commandParser;

    public function start(): void
    {
        $this->exceptionHandler = $this->configuration->exceptionHandler();

        try {
            $this->frontController = $this->container->make(FrontController::class);
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