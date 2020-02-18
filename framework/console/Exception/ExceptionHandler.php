<?php

namespace Anso\Framework\Console\Exception;

use Anso\Framework\Console\IOManager;
use Anso\Framework\Contract\ApplicationException;
use Throwable;

class ExceptionHandler
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
        $messageLength = strlen($e->getMessage());
        $border = str_repeat('~', $messageLength);

        $message = $e instanceof ApplicationException
            ? "$border\n" . $e->getMessage() . "\n$border"
            : "$border\n" . $e->getMessage() . $e->getTraceAsString(). "\n$border";

        IOManager::writeLine($message);
    }
}