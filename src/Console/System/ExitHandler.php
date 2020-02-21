<?php

namespace Algorithms\Console\System;

use Algorithms\Console\BaseCommandHandler;
use Anso\Framework\Console\ParameterBag;
use Anso\Framework\Contract\Application;

class ExitHandler extends BaseCommandHandler
{
    private Application $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle(ParameterBag $parameters): string
    {
        $this->app->stop();

        return '';
    }

    public static function description(): string
    {
        return 'Exit program';
    }
}