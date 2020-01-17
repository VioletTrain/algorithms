<?php

namespace Anso\Framework\Base;

use Anso\Framework\Contract\Application;
use Anso\Framework\Contract\Container;

abstract class BaseApp implements Application
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function bind(string $abstract, string $concrete): void
    {
        $this->container->bind($abstract, $concrete);
    }

    public function singleton(string $abstract, string $concrete): void
    {
        $this->container->singleton($abstract, $concrete);
    }

    public function make(string $class, array $parameters = [])
    {
        return $this->container->make($class, $parameters);
    }
}