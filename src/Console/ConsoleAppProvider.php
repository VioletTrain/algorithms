<?php

namespace Anso\Base;

use Anso\Config\ConsoleConfigurator;
use Anso\Console\Routing\ConsoleFrontController;
use Anso\Contract\Config\Configurator;
use Anso\Contract\Core\Application;
use Anso\Contract\Core\Container;
use Anso\Contract\Core\Provider;
use Anso\Contract\ExceptionHandler;
use Anso\Contract\Http\Kernel;
use Anso\Contract\Routing\FrontController;
use Anso\Core\HttpApp;

class ConsoleAppProvider implements Provider
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function register(): void
    {
        $this->container->singleton(Application::class, HttpApp::class);
        $this->container->bind(Configurator::class, ConsoleConfigurator::class);
        $this->container->bind(Kernel::class, \Anso\Base\Kernel::class);
        $this->container->bind(FrontController::class, ConsoleFrontController::class);
        $this->container->bind(ExceptionHandler::class, \Anso\Exception\ExceptionHandler::class);
    }
}