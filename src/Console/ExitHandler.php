<?php

namespace Algorithms\Console;

use Anso\Framework\Contract\ParameterBag;

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