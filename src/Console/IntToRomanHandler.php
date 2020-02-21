<?php

namespace Algorithms\Console;

use Algorithms\Boundary\IntBoundary;
use Algorithms\IntToRomanConverter;
use Anso\Framework\Console\Contract\IOManager;
use Anso\Framework\Console\ParameterBag;

class IntToRomanHandler extends BaseCommandHandler
{
    private IntToRomanConverter $converter;
    private IOManager $ioManager;

    public function __construct(IntToRomanConverter $converter, IOManager $ioManager)
    {
        $this->converter = $converter;
        $this->ioManager = $ioManager;
    }

    public function handle(ParameterBag $parameters): string
    {
        $integer = $parameters->getOrFirst('number');

        if (!$integer) {
            $integer = $this->ioManager->readInteger('numeric');
        }

        return $this->converter->convert(new IntBoundary($integer));
    }

    public static function description(): string
    {
        return "Convert arabic number to roman (number < 10000) (Int To Roman)" . parent::description() .
            "number - integer to convert to roman, e.g. --number=20";
    }
}