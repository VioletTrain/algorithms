<?php

namespace Anso\Framework\Console;

use Anso\Framework\Base\BaseApp;
use Anso\Framework\Console\Contract\InputHandler;
use Anso\Framework\Console\Exception\ConsoleExceptionHandler;
use Throwable;

class ConsoleApp extends BaseApp
{
    private ConsoleExceptionHandler $exceptionHandler;
    private InputHandler $inputHandler;


    public function start(): void
    {
        $this->exceptionHandler = new ConsoleExceptionHandler();

        try {
            $this->inputHandler = $this->container->make(InputHandler::class);
        } catch (Throwable $e) {
            $this->exceptionHandler->handle($e);
        }

        IOManager::writeOutput("Hello there. Type 'help' to get available commands.\n");

        while (true) {
            $input = IOManager::readInput();

            try {
                $output = $this->inputHandler->handle($input);
            } catch (Throwable $e) {
                $this->exceptionHandler->handle($e);
                continue;
            }

            IOManager::writeOutput($output);
        }
    }
}