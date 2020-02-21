<?php

namespace Algorithms\Console;

use Anso\Framework\Contract\ExceptionHandler;
use Anso\Framework\Console\Contract\IOManager;
use Anso\Framework\Contract\ApplicationException;
use Throwable;

class ConsoleExceptionHandler implements ExceptionHandler
{
    private IOManager $ioManager;

    public function __construct(IOManager $ioManager)
    {
        $this->ioManager = $ioManager;
    }

    public function handle(Throwable $e)
    {
        $this->report($e);
        $this->render($e);
    }

    private function report(Throwable $e)
    {

    }

    private function render(Throwable $e)
    {
        $border = str_repeat('~', strlen($e->getMessage()));

        $message = $e instanceof ApplicationException
            ? "$border\n" . $e->getMessage() . "\n$border"
            : "$border\n" . $e->getMessage() . "\n" . $e->getTraceAsString(). "\n$border";

        $this->ioManager->writeLine($message);
    }
}