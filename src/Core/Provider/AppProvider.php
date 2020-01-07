<?php

namespace Anso\Core\Provider;

use Anso\Contract\Core\Container;
use Anso\Contract\Core\Provider;

class AppProvider implements Provider
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function register(): void
    {
        $this->container->bind(\Anso\Contract\Http\Kernel::class, \Anso\Http\Kernel::class);
    }
}