<?php

namespace Anso\Core;

use Anso\Contract\Core\Application;
use Anso\Contract\ExceptionHandler;

class HttpApp extends Container implements Application
{
    public function getExceptionHandler(): ExceptionHandler
    {
        return new \Anso\Exception\ExceptionHandler();
    }

    public function getRoutes(): array
    {
        return $this->configurator->routes();
    }
}