<?php

namespace Anso\Framework\Console\Command;

use Anso\Console\Routing\ConsoleRouter;

class HelpCommand
{
    public const SIGNATURE = 'help';

    public function execute()
    {
        $commands = ConsoleRouter::getRoutes();
        $output = "Available commands: \n\n";

        foreach ($commands as $route) {
            $output .= $route['uri'] ."\n";
        }

        return$output;
    }
}