<?php

namespace Anso\Base;

use Anso\Config\BaseConfigurator;
use Anso\Contract\Config\Configurator;
use Anso\Contract\Core\Application;
use Anso\Contract\Core\Container;
use Anso\Contract\Core\Provider;
use Anso\Contract\ExceptionHandler;
use Anso\Contract\Http\Kernel;
use Anso\Contract\Routing\FrontController;
use Anso\Core\HttpApp;
use Anso\Base\Routing\BaseFrontController;

class BaseAppProvider implements Provider
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
        $this->container->bind(Kernel::class, \Anso\Base\Kernel::class);
        $this->container->bind(FrontController::class, BaseFrontController::class);
        $this->container->bind(ExceptionHandler::class, \Anso\Exception\BaseExceptionHandler::class);
    }
}