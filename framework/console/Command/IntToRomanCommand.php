<?php

namespace Anso\Framework\Console\Command;

use Algorithms\IntToRomanConverter;
use Anso\Framework\Console\Contract\Command;
use Anso\Framework\Console\IOManager;

class IntToRomanCommand implements Command
{
    private IntToRomanConverter $converter;

    public function __construct(IntToRomanConverter $converter)
    {
        $this->converter = $converter;
    }

    public function execute(): string
    {
        $integer = IOManager::readInteger('Enter integer:');

        return $this->converter->convert($integer);
    }

    public static function description(): string
    {
        return 'Convert arabic number to roman (number < 10000)';
    }
}