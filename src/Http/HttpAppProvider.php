<?php

namespace Anso\Http;

use Anso\Config\BaseConfigurator;
use Anso\Contract\Config\Configurator;
use Anso\Contract\Core\Application;
use Anso\Contract\Core\Container;
use Anso\Contract\Core\Provider;
use Anso\Contract\ExceptionHandler;
use Anso\Contract\Http\Kernel;
use Anso\Contract\Routing\FrontController;
use Anso\Core\HttpApp;
use Anso\Http\Routing\HttpFrontController;

class HttpAppProvider implements Provider
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function register(): void
    {
        $this->container->singleton(Application::class, HttpApp::class);
        $this->container->bind(Configurator::class, BaseConfigurator::class);
        $this->container->bind(Kernel::class, \Anso\Http\Kernel::class);
        $this->container->bind(FrontController::class, HttpFrontController::class);
        $this->container->bind(ExceptionHandler::class, \Anso\Exception\ExceptionHandler::class);
    }
}