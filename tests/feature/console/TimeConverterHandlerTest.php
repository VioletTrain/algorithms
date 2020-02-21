<?php

namespace Tests\Feature\Console;

class TimeConverterHandlerTest extends ConsoleTestCase
{
    public function test_Handler_OutputsTallestCandlesCount_WhenInputIsStringOfIntegers()
    {
        $this->ioManager->pushCommand('tc --time=12:32:43AM');

        $this->application->start();

        $expected = '00:32:43';

        $output = $this->findExpected($expected);

        $this->assertEquals($expected, $output);
    }
}
