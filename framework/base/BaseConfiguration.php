<?php

namespace Anso\Framework\Base;

use Anso\Framework\Contract\Configuration;
use ErrorException;

class BaseConfiguration implements Configuration
{
    protected string $application = 'http';
    protected array $routes = [];

    public function __construct($configPath = '/config')
    {
        $this->routes = include(BASE_PATH . $configPath . "/routes.php");
        $this->configure();
    }

    public function configure(): Configuration
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
        return $this->routes[$this->application];
    }
}