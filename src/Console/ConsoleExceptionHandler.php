<?php

namespace Algorithms\Console;

use Anso\Framework\Contract\ExceptionHandler;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Contract\ApplicationException;
use Throwable;

class ConsoleExceptionHandler implements ExceptionHandler
{
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

        IOManager::writeLine($message);
    }
}