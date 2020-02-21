<?php

namespace Tests\Feature\Console;

class BirthdayCakeCandlesHandlerTest extends ConsoleTestCase
{
    public function test_Handler_OutputsTallestCandlesCount_WhenInputIsStringOfIntegers()
    {
        $this->ioManager->pushCommand('bc --candles=3 4 4 5 5 5 5')
            ->pushCommand('exit');

        $this->application->start();

        $expected = '4';

        $output = $this->findExpected($expected);

        $this->assertEquals($expected, $output);
    }
}
