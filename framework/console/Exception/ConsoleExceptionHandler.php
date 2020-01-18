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
        $topBorder = str_repeat('~', $messageLength);
        $bottomBorder = str_repeat('~', $messageLength);

        $this->ioManager->writeOutput("$topBorder\n" . $e->getMessage() . "\n$bottomBorder");
    }
}