<?php

namespace Anso\Framework\Console;

use Anso\Framework\Base\BaseApp;
use Anso\Framework\Console\Contract\InputHandler;
use Anso\Framework\Console\Exception\ConsoleExceptionHandler;
use Throwable;

class ConsoleApp extends BaseApp
{
    private IOManager $ioManager;
    private ConsoleExceptionHandler $exceptionHandler;
    private InputHandler $inputHandler;


    public function start(): void
    {
        $this->ioManager = new IOManager();
        $this->exceptionHandler = new ConsoleExceptionHandler($this->ioManager);

        try {
            $this->inputHandler = $this->container->make(InputHandler::class);
        } catch (Throwable $e) {
            $this->exceptionHandler->handle($e);
        }

        $this->ioManager->writeOutput("Hello there. Type 'help' to get available commands.\n");

        while (true) {
            $input = $this->ioManager->readInput();

            try {
                $output = $this->inputHandler->handle($input);
            } catch (Throwable $e) {
                $this->exceptionHandler->handle($e);
                continue;
            }

            $this->ioManager->writeOutput($output);
        }
    }
}