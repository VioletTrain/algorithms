<?php

namespace Anso\Core\Provider;

use Anso\Contract\Core\Container;
use Anso\Contract\Core\Provider;

class AlgorithmsProvider implements Provider
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function register(): void
    {
    }
}