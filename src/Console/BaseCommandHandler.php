<?php

namespace Algorithms\Console;

use Anso\Framework\Console\Contract\CommandHandler;

abstract class BaseCommandHandler implements CommandHandler
{
    public static function description(): string
    {
        return "\n    Parameters:\n    ";
    }
}