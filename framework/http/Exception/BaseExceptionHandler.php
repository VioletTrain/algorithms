<?php

namespace Anso\Framework\Http\Exception;

use Algorithms\Exception\BoundaryException;
use Anso\Framework\Contract\ApplicationException;
use Anso\Framework\Http\Contract\Exception\ExceptionHandler;
use Anso\Framework\Http\Contract\Exception\HttpException;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\BaseResponse;
use Throwable;

class BaseExceptionHandler implements ExceptionHandler
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
            return new BaseResponse(['error' => $e->getMessage()], BaseResponse::HTTP_BAD_REQUEST);
        }

        return $e instanceof HttpException
            ? new BaseResponse(['error' => $e->getMessage()], $e->getCode())
            : new BaseResponse($this->formatException($e), 500);
    }
}