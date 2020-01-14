<?php

namespace Anso\Exception;

use Anso\Contract\Http\Request;
use Anso\Contract\HttpException;
use Anso\Contract\Http\Response as ResponseContract;
use Anso\Http\BaseResponse;
use Throwable;

class ExceptionHandler implements \Anso\Contract\ExceptionHandler
{
    public function handle(Request $request, Throwable $e): ResponseContract
    {
        $this->report($e);

        return $this->render($request, $e);
    }

    public function report(Throwable $e): void
    {
        if ($e instanceof HttpNotFoundException) {
            return;
        }

        //TODO: log exception

    }

    protected function formatException(Throwable $e): string
    {
        return $e->getMessage() . ' ' . $e->getTraceAsString() . '\n' . $e->getTraceAsString();
    }

    public function render(Request $request, Throwable $e): ResponseContract
    {
        return $e instanceof HttpException
            ? new BaseResponse($e->getMessage(), $e->getCode())
            : new BaseResponse($e->getMessage(), 500);
    }
}