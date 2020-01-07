<?php

namespace Anso\Core;

use Anso\Contract\Http\Kernel;
use Anso\Exception\ExceptionHandler;
use Anso\Http\Routing\FrontController;

class App extends Container
{
    public function getKernel(): Kernel
    {
        return new \Anso\Http\Kernel(new FrontController(), new ExceptionHandler());
    }
}