<?php

namespace Algorithms\Console\System;

use Algorithms\Console\BaseCommandHandler;
use Anso\Framework\Console\ParameterBag;

class ExitHandler extends BaseCommandHandler
{
    public function handle(ParameterBag $parameters): string
    {
        exit;
    }

    public static function description(): string
    {
        return 'Exit program';
    }
}