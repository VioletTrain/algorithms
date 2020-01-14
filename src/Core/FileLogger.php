<?php

namespace Anso\Core;

use Anso\Contract\Core\Logger;
use DateTime;

class FileLogger implements Logger
{
    public function log($data): void
    {
        $currentDateTime = new DateTime();
        $date = $currentDateTime->format('YYYY-mm-dd');

        $logFile = fopen('log-' . $date . '.log', 'w');
        fwrite($logFile, $this->formatException($e));
        fclose($logFile);
    }
}