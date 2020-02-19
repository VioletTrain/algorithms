<?php

namespace Algorithms\Http;

use Algorithms\Exception\BoundaryException;
use Anso\Framework\Contract\ApplicationException;
use Anso\Framework\Http\Contract\Exception\ExceptionHandler;
use Anso\Framework\Http\Contract\Exception\HttpException;
use Anso\Framework\Http\Request;
use Anso\Framework\Http\Response;
use Throwable;

class HttpExceptionHandler implements ExceptionHandler
{
    public function handle(Request $request, Throwable $e): Response
    {
        $this->report($e);

        return $this->render($request, $e);
    }

    public function report(Throwable $e): void
    {
        if ($e instanceof ApplicationException) {
        }

        //TODO: log exception
    }

    protected function formatException(Throwable $e): string
    {
        return $e->getMessage() . "
            " . $e->getTraceAsString();
    }

    public function render(Request $request, Throwable $e): Response
    {
        if ($e instanceof BoundaryException) {
            return new Response(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }

        return $e instanceof HttpException
            ? new Response(['error' => $e->getMessage()], $e->getCode())
            : new Response($this->formatException($e), 500);
    }
}