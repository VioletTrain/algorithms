<?php

namespace Algorithms\Console;

use Anso\Framework\Console\ConsoleApp;
use Anso\Framework\Console\ConsoleConfiguration;
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
        $this->container->singleton(Container::class, ConsoleApp::class);
        $this->container->singleton(Configuration::class, ConsoleConfiguration::class);
    }
}