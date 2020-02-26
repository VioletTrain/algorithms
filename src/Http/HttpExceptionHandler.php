<?php

namespace Algorithms\Http;

use Algorithms\Exception\BoundaryException;
use Anso\Framework\Contract\ApplicationException;
use Anso\Framework\Contract\ExceptionHandler;
use Anso\Framework\Contract\Logger;
use Anso\Framework\Http\Contract\Exception\HttpException;
use Anso\Framework\Http\Response;
use Throwable;

class HttpExceptionHandler implements ExceptionHandler
{
    private Logger $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function handle(Throwable $e): void
    {
        $this->report($e);
        $this->render($e);
    }

    public function report(Throwable $e): void
    {
        if ($e instanceof ApplicationException) {
            return;
        }

        $this->logger->log($e->getMessage() . "\n" . $e->getTraceAsString());
    }

    public function render(Throwable $e): void
    {
        if ($e instanceof BoundaryException) {
            $response = new Response(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        } else {
            $response = $e instanceof HttpException
                ? new Response(['error' => $e->getMessage()], $e->getCode())
                : new Response(['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()], 500);
        }

        $response->send();
    }
}