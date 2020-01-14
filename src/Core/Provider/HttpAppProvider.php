<?php

namespace Anso\Core\Provider;

use Anso\Contract\Config\Configurator;
use Anso\Contract\Core\Application;
use Anso\Contract\Core\Container;
use Anso\Contract\Core\Provider;
use Anso\Contract\ExceptionHandler;
use Anso\Contract\Http\Kernel;
use Anso\Contract\Http\Routing\FrontController;

class HttpAppProvider implements Provider
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function register(): void
    {
        $this->container->singleton(Application::class, \Anso\Core\HttpApp::class);
        $this->container->bind(Configurator::class, \Anso\Config\Configurator::class);
        $this->container->bind(Kernel::class, \Anso\Http\Kernel::class);
        $this->container->bind(FrontController::class, \Anso\Http\Routing\FrontController::class);
        $this->container->bind(ExceptionHandler::class, \Anso\Exception\ExceptionHandler::class);
    }
}