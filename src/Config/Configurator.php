<?php

namespace Anso\Config;

use Anso\Core\Provider\AppProvider;
use ErrorException;

class Configurator implements \Anso\Contract\Config\Configurator
{
    public function __construct()
    {
        $this->configure();
    }

    public function configure(): \Anso\Contract\Config\Configurator
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
        return [
            AppProvider::class
        ];
    }
}