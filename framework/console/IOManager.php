<?php

namespace Anso\Framework\Console;

class IOManager
{
    public const NEW_LINE = "\n";

    public static function readLine($prompt = null): string
    {
        return readline($prompt . "\n > ");
    }

    public static function writeLine(string $output): void
    {
        echo IOManager::NEW_LINE . $output . IOManager::NEW_LINE;
    }

    public static function readInteger(string $integerName): int
    {
        $integer = IOManager::readLine("Enter $integerName:");

        if (!is_numeric($integer)) {
            IOManager::writeLine("Input data must be an integer");

            return static::readInteger($integerName);
        }

        return $integer;
    }
}