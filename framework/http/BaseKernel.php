<?php

namespace Anso\Framework\Http;

use Anso\Framework\Http\Contract\Exception\ExceptionHandler;
use Anso\Framework\Http\Contract\Kernel;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\FrontController;
use Throwable;

class BaseKernel implements Kernel
{
    private FrontController $controller;
    private ExceptionHandler $handler;

    public function __construct(FrontController $controller, ExceptionHandler $handler)
    {
        $this->controller = $controller;
        $this->handler = $handler;
    }

    public function handle(Request $request): Response
    {
        try {
            $response = $this->controller->handle($request);
        } catch (Throwable $e) {
            $this->reportException($e);
            $response = $this->renderException($request, $e);
        }

        return $response;
    }

    protected function reportException(Throwable $e): void
    {
        $this->handler->report($e);
    }

    protected function renderException(Request $request, Throwable $e): Response
    {
        return $this->handler->render($request, $e);
    }
}