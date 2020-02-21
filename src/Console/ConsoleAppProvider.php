<?php

namespace Algorithms\Console;

use Anso\Framework\Console\ConsoleApp;
use Anso\Framework\Console\Contract\IOManager as IOManagerContract;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Contract\Application;
use Anso\Framework\Base\Configuration;
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
        $this->container->singleton(Container::class, ConsoleApp::class);
        $this->container->singleton(Configuration::class, Configuration::class);
        $this->container->singleton(IOManagerContract::class, IOManager::class);
    }
}