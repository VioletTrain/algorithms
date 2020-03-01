<?php

namespace Tests\Feature\Console;

use Anso\Framework\Console\Test\ConsoleTestCase;

class PlusMinusHandlerTest extends ConsoleTestCase
{
    public function test_Handler_OutputsRatios_WhenInputIsStringOfIntegers()
    {
        $this->ioManager->pushCommand('pm --array=1 2 -3 -5 0');

        $this->application->start();

        $expected = "0.400000\n0.400000\n0.200000";

        $output = $this->findExpected($expected);

        $this->assertEquals(str_replace("\n", '', $expected), $output);
    }
}
