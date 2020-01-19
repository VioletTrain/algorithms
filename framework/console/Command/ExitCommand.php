<?php

namespace Anso\Framework\Console\Command;

use Anso\Framework\Console\Contract\Command;

class ExitCommand implements Command
{
    public function execute(): string
    {
        exit;
    }

    public static function description(): string
    {
        return 'Exit program';
    }
}