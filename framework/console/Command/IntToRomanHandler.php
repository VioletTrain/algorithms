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
        $integer = $parameters->get('number') ? $parameters->get('number') : $parameters->first();

        if (!$integer) {
            $integer = IOManager::readInteger('numeric');
        }

        return $this->converter->convert(new IntBoundary($integer));
    }

    public static function description(): string
    {
        return "Convert arabic number to roman (number < 10000)" . parent::description() .
            "number - integer to convert to roman, e.g. --number=20";
    }
}