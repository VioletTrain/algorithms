<?php

namespace Anso\Framework\Console;

class IOManager
{
    public static function readInput($prompt = null): string
    {
        return readline($prompt . "\n > ");
    }

    public static function writeOutput(string $output): void
    {
        echo "\n" . $output . "\n";
    }
}