<?php

namespace Tests\Feature\Console;

class LargestDecentNumberHandlerTest extends ConsoleTestCase
{
    public function test_Handler_OutputsLargestDecentNumber_WhenSuitableIntIsGiven()
    {
        $this->ioManager->pushCommand('ldn 5')
            ->pushCommand('exit');

        $this->application->start();

        $expected = '33333';

        $output = $this->findExpected($expected);

        $this->assertEquals($expected, $output);
    }
}
