<?php

namespace Anso\Base;

use Anso\Contract\ExceptionHandler;
use Anso\Contract\Routing\FrontController;
use Anso\Contract\Http\Request;
use Anso\Contract\Http\Response;
use Throwable;

class Kernel implements \Anso\Contract\Http\Kernel
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