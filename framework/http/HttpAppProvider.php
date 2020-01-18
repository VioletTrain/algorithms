<?php

namespace Anso\Framework\Http;

use Anso\Framework\Contract\Provider;
use Anso\Framework\Contract\Container;
use Anso\Framework\Contract\Application;
use Anso\Framework\Contract\Configuration;
use Anso\Framework\Base\BaseConfiguration;
use Anso\Framework\Http\Contract\Exception\ExceptionHandler;
use Anso\Framework\Http\Contract\Kernel;
use Anso\Framework\Http\Contract\Routing\FrontController;
use Anso\Framework\Http\Exception\BaseExceptionHandler;
use Anso\Framework\Http\Routing\BaseFrontController;

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
        $this->container->singleton(Container::class, HttpApp::class);
        $this->container->singleton(Configuration::class, BaseConfiguration::class);
        $this->container->bind(Kernel::class, BaseKernel::class);
        $this->container->bind(FrontController::class, BaseFrontController::class);
        $this->container->bind(ExceptionHandler::class, BaseExceptionHandler::class);
    }
}