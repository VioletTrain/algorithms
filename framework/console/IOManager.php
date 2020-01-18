<?php

namespace Anso\Framework\Console;

class IOManager
{
    public function readInput($prompt = null): string
    {
        return readline($prompt . "\n > ");
    }

    public function writeOutput(string $output): void
    {
        echo "\n" . $output . "\n";
    }
}