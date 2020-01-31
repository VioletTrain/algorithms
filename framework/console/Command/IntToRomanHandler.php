<?php

namespace Anso\Framework\Console\Command;

use Algorithms\Boundary\IntBoundary;
use Algorithms\IntToRomanConverter;
use Anso\Framework\Console\IOManager;
use Anso\Framework\Contract\ParameterBag;

class IntToRomanHandler extends BaseCommandHandler
{
    private IntToRomanConverter $converter;

    public function __construct(IntToRomanConverter $converter)
    {
        $this->converter = $converter;
    }

    public function handle(ParameterBag $parameters): string
    {
        $integer = $parameters->getOrFirst('number');

        if (!$integer) {
            $integer = IOManager::readInteger('numeric');
        }

        return $this->converter->convert(new IntBoundary($integer));
    }

    public static function description(): string
    {
        return "Convert arabic number to roman (number < 10000) (Int To Roman)" . parent::description() .
            "number - integer to convert to roman, e.g. --number=20";
    }
}