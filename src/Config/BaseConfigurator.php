<?php

namespace Anso\Config;

use Anso\Contract\Config\Configurator;
use ErrorException;

class BaseConfigurator implements Configurator
{
    protected string $application = 'http';

    public function __construct()
    {
        $this->configure();
    }

    public function configure(): Configurator
    {
        $this->configurePhp();

        return $this;
    }

    private function configurePhp(): void
    {
        set_error_handler(function ($code, $message, $file, $line) {
            throw new ErrorException($message, $code, $code, $file, $line);
        });
    }

    public function providers(): array
    {
        $providers = include(BASE_PATH . '/config/providers.php');

        return $providers[$this->application];
    }

    public function routes(): array
    {
        $routes = include(BASE_PATH . '/config/routes.php');

        return $routes[$this->application];
    }
}