<?php

namespace Anso\Framework\Console;

class IOManager
{
    public function readInput(): string
    {
        return readline();
    }

    public function writeOutput(string $output): void
    {
        echo $output . "\n";
    }
}