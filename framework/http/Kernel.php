<?php

namespace Anso\Framework\Http;

use Anso\Framework\Http\Exception\ExceptionHandler;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Routing\FrontController;
use Throwable;

class Kernel
{
    protected FrontController $controller;
    protected ExceptionHandler $handler;

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
            $this->handler->report($e);
            $response = $this->handler->render($request, $e);
        }

        return $response;
    }
}