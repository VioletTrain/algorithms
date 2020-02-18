<?php

namespace Anso\Framework\Console;

use Anso\Framework\Console\Exception\InvalidFormatException;

class IOManager
{
    public const NEW_LINE = "\n";

    public static function readLine($prompt = ''): string
    {
        return trim(readline($prompt . "\n > "));
    }

    public static function writeLine(string $output): void
    {
        echo IOManager::NEW_LINE . $output . IOManager::NEW_LINE . IOManager::NEW_LINE;
    }

    /**
     * @param string $integerName
     * @return int
     * @throws InvalidFormatException
     */
    public static function readInteger(string $integerName): int
    {
        $integer = IOManager::readLine("Enter $integerName:");

        if (!is_numeric($integer)) {
            throw new InvalidFormatException('numeric');
        }

        return $integer;
    }
}