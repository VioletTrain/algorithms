<?php

namespace Anso\Contract\Core;

use Anso\Contract\ExceptionHandler;

interface Application extends Container
{
    public function getExceptionHandler(): ExceptionHandler;
    public function getRoutes(): array;
}