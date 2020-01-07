<?php

namespace Anso\Exception;

use Anso\Contract\Http\Request;
use Anso\Contract\Http\Response;
use Anso\Http\SymfonyResponseAdapter;
use DateTime;
use Throwable;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class ExceptionHandler implements \Anso\Contract\ExceptionHandler
{
    public function report(Throwable $e): void
    {
        if ($e instanceof HttpNotFoundException) {
            return;
        }

        $currentDateTime = new DateTime();
        $date = $currentDateTime->format('YYYY-mm-dd');

        $logFile = fopen('log-' . $date . '.log', 'w');
        fwrite($logFile, $this->formatException($e));
        fclose($logFile);
    }

    protected function formatException(Throwable $e): string
    {
        return $e->getMessage() . '\n' . $e->getTraceAsString();
    }

    public function render(Request $request, Throwable $e): Response
    {
        $symfonyResponse = new SymfonyResponse($e->getMessage(), $e->getCode());

        return new SymfonyResponseAdapter($symfonyResponse);
    }

}