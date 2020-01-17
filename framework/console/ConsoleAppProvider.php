<?php

namespace Anso\Framework\Console;

use Anso\Framework\Contract\Application;
use Anso\Framework\Contract\Configuration;
use Anso\Framework\Contract\Container;
use Anso\Framework\Contract\Provider;

class ConsoleAppProvider implements Provider
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function register(): void
    {
        $this->container->singleton(Application::class, ConsoleApp::class);
        $this->container->bind(Configuration::class, ConsoleConfiguration::class);
//        $this->container->bind(Kernel::class, \Anso\Base\HttpKernel::class);
//        $this->container->bind(FrontController::class, ConsoleFrontController::class);
//        $this->container->bind(ExceptionHandler::class, ConsoleExceptionHandler::class);
    }
}