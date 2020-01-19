<?php

namespace Anso\Framework\Console\Exception;

use Anso\Framework\Console\IOManager;
use Throwable;

class ConsoleExceptionHandler
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
        $messageLength = strlen($e->getMessage());
        $border = str_repeat('~', $messageLength);

        $message = $e instanceof CommandNotFoundException
            ? "$border\n" . $e->getMessage() . "\n$border"
            : "$border\n" . $e->getMessage() . $e->getTraceAsString(). "\n$border";

        $this->ioManager->writeOutput($message);
    }
}